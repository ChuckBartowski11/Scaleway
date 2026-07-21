<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Client;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Exception\ApiException;
use ChuckBartowski\ScalewaySdk\Exception\AuthenticationException;
use ChuckBartowski\ScalewaySdk\Exception\TransportException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;
use Symfony\Component\HttpClient\Response\MockResponse;

final class ScalewayClientTest extends TestCase
{
    private function client(MockHttpClient $http): ScalewayClient
    {
        return new ScalewayClient('SCWXXXXXXXXXXXXXXXXX', httpClient: $http);
    }

    public function testGetSendsAuthTokenHeader(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertSame('GET', $method);
            $this->assertSame('https://api.scaleway.com/account/v3/projects', $url);
            $this->assertContains('X-Auth-Token: SCWXXXXXXXXXXXXXXXXX', $options['headers']);

            return new JsonMockResponse(['projects' => [], 'total_count' => 0]);
        });

        $response = $this->client($http)->get('/account/v3/projects');

        $this->assertTrue($response->success);
        $this->assertSame(0, $response->data('total_count'));
    }

    public function testErrorMapsMessageTypeAndDetails(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'message' => 'invalid argument(s)',
            'type' => 'invalid_arguments',
            'details' => [
                ['argument_name' => 'commercial_type', 'help_message' => 'unknown commercial type'],
            ],
        ], ['http_code' => 400]));

        $response = $this->client($http)->post('/instance/v1/zones/fr-par-1/servers', ['name' => 'x']);

        $this->assertFalse($response->success);
        $this->assertSame([
            'invalid_arguments: invalid argument(s)',
            'commercial_type: unknown commercial type',
        ], $response->errors);

        $this->expectException(ApiException::class);
        $response->ensureSuccess();
    }

    public function testUnauthorizedThrowsAuthenticationException(): void
    {
        $http = new MockHttpClient(new JsonMockResponse(['message' => 'denied'], ['http_code' => 401]));

        $this->expectException(AuthenticationException::class);
        $this->client($http)->get('/account/v3/projects');
    }

    public function testMissingSecretKeyThrowsBeforeAnyRequest(): void
    {
        $client = new ScalewayClient('', httpClient: new MockHttpClient());

        $this->expectException(AuthenticationException::class);
        $client->get('/account/v3/projects');
    }

    public function testPatchSendsJsonBody(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertSame('PATCH', $method);
            $this->assertJsonStringEqualsJsonString('{"name":"renamed"}', $options['body']);

            return new JsonMockResponse(['server' => ['name' => 'renamed']]);
        });

        $response = $this->client($http)->patch('/instance/v1/zones/fr-par-1/servers/uuid', ['name' => 'renamed']);

        $this->assertTrue($response->success);
    }

    public function testEmptyBodyIsSuccessWithNullData(): void
    {
        $http = new MockHttpClient(new MockResponse('', ['http_code' => 204]));

        $response = $this->client($http)->delete('/instance/v1/zones/fr-par-1/servers/uuid');

        $this->assertTrue($response->success);
        $this->assertNull($response->data);
    }

    public function testInvalidJsonThrowsTransportException(): void
    {
        $http = new MockHttpClient(new MockResponse('<html>gateway</html>', ['http_code' => 200]));

        $this->expectException(TransportException::class);
        $this->client($http)->get('/account/v3/projects');
    }
}
