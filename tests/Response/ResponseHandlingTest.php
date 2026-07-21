<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Response;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

final class ResponseHandlingTest extends TestCase
{
    private function client(MockHttpClient $http): ScalewayClient
    {
        return new ScalewayClient('SCWKEY', httpClient: $http);
    }

    public function testItemsAutoDetectsWrapperKey(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'servers' => [['id' => 'a'], ['id' => 'b']],
            'total_count' => 2,
        ]));

        $response = $this->client($http)->get('/instance/v1/zones/fr-par-1/servers');

        $this->assertSame([['id' => 'a'], ['id' => 'b']], $response->items());
        $this->assertSame(['id' => 'a'], $response->first());
        $this->assertSame(2, $response->totalCount());
    }

    public function testItemsWithExplicitKey(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'clusters' => [['id' => 'c1']],
            'total_count' => 1,
        ]));

        $response = $this->client($http)->get('/k8s/v1/regions/fr-par/clusters');

        $this->assertSame([['id' => 'c1']], $response->items('clusters'));
        $this->assertSame([], $response->items('unknown'));
    }

    public function testTotalCountFallsBackToHeader(): void
    {
        $http = new MockHttpClient(new JsonMockResponse(
            ['servers' => [['id' => 'a']]],
            ['response_headers' => ['x-total-count' => '42']],
        ));

        $response = $this->client($http)->get('/instance/v1/zones/fr-par-1/servers');

        $this->assertSame(42, $response->totalCount());
        $this->assertSame('42', $response->header('X-Total-Count'));
    }

    public function testItemsOnSingleResourceReturnsEmpty(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'server' => ['id' => 'a', 'name' => 'web01'],
        ]));

        $response = $this->client($http)->get('/instance/v1/zones/fr-par-1/servers/a');

        $this->assertSame([], $response->items());
        $this->assertSame('web01', $response->data('server')['name']);
    }

    public function testPaginateIteratesAllPages(): void
    {
        $pages = [
            new JsonMockResponse(['servers' => [['id' => 'a'], ['id' => 'b']], 'total_count' => 3]),
            new JsonMockResponse(['servers' => [['id' => 'c']], 'total_count' => 3]),
        ];
        $requested = [];
        $http = new MockHttpClient(function (string $method, string $url) use (&$pages, &$requested): JsonMockResponse {
            $requested[] = $url;

            return array_shift($pages);
        });

        $ids = [];

        foreach ($this->client($http)->paginate('/instance/v1/zones/fr-par-1/servers', [], 'servers', 2, 'per_page') as $server) {
            $ids[] = $server['id'];
        }

        $this->assertSame(['a', 'b', 'c'], $ids);
        $this->assertCount(2, $requested);
        $this->assertStringContainsString('page=1', $requested[0]);
        $this->assertStringContainsString('per_page=2', $requested[0]);
        $this->assertStringContainsString('page=2', $requested[1]);
    }
}
