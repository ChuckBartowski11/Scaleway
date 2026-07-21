<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Api;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Exception\ApiException;
use ChuckBartowski\ScalewaySdk\Exception\ConflictException;
use ChuckBartowski\ScalewaySdk\Exception\QuotaExceededException;
use ChuckBartowski\ScalewaySdk\Exception\RateLimitException;
use ChuckBartowski\ScalewaySdk\Exception\ResourceNotFoundException;
use ChuckBartowski\ScalewaySdk\Scaleway;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

final class RobustnessTest extends TestCase
{
    private function scaleway(MockHttpClient $http): Scaleway
    {
        return new Scaleway(new ScalewayClient('SCWKEY', httpClient: $http));
    }

    public function testNotFoundThrowsResourceNotFoundException(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'message' => 'resource is not found',
            'type' => 'not_found',
        ], ['http_code' => 404]));

        $this->expectException(ResourceNotFoundException::class);
        $this->scaleway($http)->instances()->server('unknown');
    }

    public function testConflictThrowsConflictException(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'message' => 'resource is still in use',
        ], ['http_code' => 409]));

        $this->expectException(ConflictException::class);
        $this->scaleway($http)->vpc()->deletePrivateNetwork('pn-1');
    }

    public function testRateLimitExposesRetryAfter(): void
    {
        $http = new MockHttpClient(new JsonMockResponse(
            ['message' => 'too many requests'],
            ['http_code' => 429, 'response_headers' => ['retry-after' => '17']],
        ));

        try {
            $this->scaleway($http)->instances()->servers();
            $this->fail('Expected RateLimitException');
        } catch (RateLimitException $e) {
            $this->assertSame(17, $e->getRetryAfter());
            $this->assertSame(429, $e->getStatusCode());
        }
    }

    public function testQuotaExceededTypeThrowsDedicatedException(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'message' => 'quota exceeded',
            'type' => 'quotas_exceeded',
        ], ['http_code' => 403]));

        $this->expectException(QuotaExceededException::class);
        $this->scaleway($http)->instances()->createServer('web01', 'DEV1-S', 'ubuntu_jammy');
    }

    public function testTypedExceptionsRemainCatchableAsApiException(): void
    {
        $http = new MockHttpClient(new JsonMockResponse(['message' => 'nope'], ['http_code' => 404]));

        $this->expectException(ApiException::class);
        $this->scaleway($http)->instances()->server('unknown');
    }

    public function testWaitForServerStatePollsUntilRunning(): void
    {
        $responses = [
            new JsonMockResponse(['server' => ['id' => 'a', 'state' => 'starting']]),
            new JsonMockResponse(['server' => ['id' => 'a', 'state' => 'starting']]),
            new JsonMockResponse(['server' => ['id' => 'a', 'state' => 'running']]),
        ];
        $http = new MockHttpClient($responses);

        $response = $this->scaleway($http)->instances()->waitForServerState('a', 'running', 5.0, 0.0);

        $this->assertSame('running', $response->data('server')['state']);
    }

    public function testWaitFailsFastOnFailureState(): void
    {
        $http = new MockHttpClient(new JsonMockResponse(['id' => 'db-1', 'status' => 'error']));

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('entered state "error"');
        $this->scaleway($http)->databases()->waitForInstanceReady('db-1', 5.0, 0.0);
    }

    public function testWaitTimesOut(): void
    {
        $http = new MockHttpClient(static fn (): JsonMockResponse => new JsonMockResponse(['server' => ['state' => 'starting']]));

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('Timed out');
        $this->scaleway($http)->instances()->waitForServerState('a', 'running', 0.0, 0.0);
    }

    public function testRetryFailedRecoversFromTransientErrors(): void
    {
        $calls = 0;
        $http = new MockHttpClient(function () use (&$calls): JsonMockResponse {
            ++$calls;

            return 1 === $calls
                ? new JsonMockResponse(['message' => 'internal error'], ['http_code' => 503])
                : new JsonMockResponse(['servers' => [], 'total_count' => 0]);
        });

        $client = new ScalewayClient('SCWKEY', retryFailed: true, maxRetries: 2, httpClient: $http);
        $response = $client->get('/instance/v1/zones/fr-par-1/servers');

        $this->assertTrue($response->success);
        $this->assertSame(2, $calls);
    }
}
