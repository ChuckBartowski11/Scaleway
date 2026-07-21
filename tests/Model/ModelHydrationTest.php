<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Model;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Model\Domain\Record;
use ChuckBartowski\ScalewaySdk\Model\Instance\Server;
use ChuckBartowski\ScalewaySdk\Model\K8s\Cluster;
use ChuckBartowski\ScalewaySdk\Model\Rdb\Instance;
use ChuckBartowski\ScalewaySdk\Model\SecretManager\Secret;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

final class ModelHydrationTest extends TestCase
{
    private function client(MockHttpClient $http): ScalewayClient
    {
        return new ScalewayClient('SCWKEY', httpClient: $http);
    }

    public function testServerModelFromRealisticPayload(): void
    {
        $server = Server::from([
            'id' => 'd67f36bc-0001',
            'name' => 'web01',
            'commercial_type' => 'DEV1-S',
            'state' => 'running',
            'public_ip' => ['address' => '203.0.113.10', 'dynamic' => false],
            'tags' => ['prod', 'web'],
            'protected' => true,
            'zone' => 'fr-par-1',
            'unknown_future_field' => 'kept in raw',
        ]);

        $this->assertSame('d67f36bc-0001', $server->id);
        $this->assertSame('DEV1-S', $server->commercialType);
        $this->assertSame('running', $server->state);
        $this->assertSame('203.0.113.10', $server->publicIp['address']);
        $this->assertSame(['prod', 'web'], $server->tags);
        $this->assertTrue($server->protected);
        $this->assertSame('kept in raw', $server->raw['unknown_future_field']);
    }

    public function testAsUnwrapsSingleKeyEnvelope(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'server' => ['id' => 'a', 'name' => 'web01', 'state' => 'stopped'],
        ]));

        $server = $this->client($http)->get('/instance/v1/zones/fr-par-1/servers/a')->as(Server::class);

        $this->assertInstanceOf(Server::class, $server);
        $this->assertSame('web01', $server->name);
    }

    public function testAsHydratesBareObject(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'id' => 'db-1',
            'name' => 'main-db',
            'engine' => 'PostgreSQL-15',
            'is_ha_cluster' => true,
            'endpoints' => [['ip' => '10.0.0.1', 'port' => 5432]],
        ]));

        $instance = $this->client($http)->get('/rdb/v1/regions/fr-par/instances/db-1')->as(Instance::class);

        $this->assertSame('PostgreSQL-15', $instance->engine);
        $this->assertTrue($instance->isHaCluster);
        $this->assertSame(5432, $instance->endpoints[0]['port']);
    }

    public function testAsListHydratesWrappedCollections(): void
    {
        $http = new MockHttpClient(new JsonMockResponse([
            'records' => [
                ['id' => 'r1', 'name' => 'www', 'type' => 'A', 'data' => '203.0.113.10', 'ttl' => 3600],
                ['id' => 'r2', 'name' => 'mail', 'type' => 'MX', 'data' => 'mx.example.com.', 'ttl' => 3600, 'priority' => 10],
            ],
            'total_count' => 2,
        ]));

        $records = $this->client($http)->get('/domain/v2beta1/dns-zones/example.com/records')->asList(Record::class);

        $this->assertCount(2, $records);
        $this->assertContainsOnlyInstancesOf(Record::class, $records);
        $this->assertSame('A', $records[0]->type);
        $this->assertSame(10, $records[1]->priority);
    }

    public function testTypeCoercionIsSafe(): void
    {
        $cluster = Cluster::from(['name' => 'prod', 'tags' => 'not-an-array', 'upgrade_available' => 1]);

        $this->assertSame('prod', $cluster->name);
        $this->assertSame([], $cluster->tags);
        $this->assertTrue($cluster->upgradeAvailable);
        $this->assertNull($cluster->version);
    }

    public function testSecretModelExists(): void
    {
        $secret = Secret::from(['id' => 's1', 'name' => 'db-password', 'version_count' => 3]);

        $this->assertSame(3, $secret->versionCount);
    }
}
