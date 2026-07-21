<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Api;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Scaleway;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

final class FacadeTest extends TestCase
{
    private function scaleway(MockHttpClient $http): Scaleway
    {
        return new Scaleway(new ScalewayClient(
            'SCWKEY',
            defaultProjectId: 'proj-uuid',
            defaultZone: 'fr-par-1',
            defaultRegion: 'fr-par',
            httpClient: $http,
        ));
    }

    public function testInstanceCreateUsesDefaultZoneAndInjectsProject(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertSame('POST', $method);
            $this->assertStringEndsWith('/instance/v1/zones/fr-par-1/servers', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame('proj-uuid', $body['project']);
            $this->assertSame('DEV1-S', $body['commercial_type']);

            return new JsonMockResponse(['server' => ['id' => 'uuid']], ['http_code' => 201]);
        });

        $this->scaleway($http)->instances()->createServer('web01', 'DEV1-S', 'ubuntu_jammy');
    }

    public function testZoneOverridePerCall(): void
    {
        $http = new MockHttpClient(function (string $method, string $url): JsonMockResponse {
            $this->assertStringEndsWith('/instance/v1/zones/nl-ams-1/servers', $url);

            return new JsonMockResponse(['servers' => []]);
        });

        $this->scaleway($http)->instances()->servers(zone: 'nl-ams-1');
    }

    public function testServerActionBody(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/servers/uuid/action', $url);
            $this->assertJsonStringEqualsJsonString('{"action":"poweron"}', $options['body']);

            return new JsonMockResponse(['task' => ['id' => 't1', 'status' => 'pending']], ['http_code' => 202]);
        });

        $this->scaleway($http)->instances()->powerOn('uuid');
    }

    public function testRdbUsesRegionalPath(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/rdb/v1/regions/fr-par/instances', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame('proj-uuid', $body['project_id']);
            $this->assertSame('PostgreSQL-15', $body['engine']);

            return new JsonMockResponse(['id' => 'db-uuid'], ['http_code' => 201]);
        });

        $this->scaleway($http)->databases()->createInstance('main-db', 'PostgreSQL-15', 'db-dev-s', 'admin', 'S3cret!');
    }

    public function testDnsAddRecordBuildsChangesPayload(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertSame('PATCH', $method);
            $this->assertStringEndsWith('/domain/v2beta1/dns-zones/example.com/records', $url);
            $body = json_decode($options['body'], true);
            $record = $body['changes'][0]['add']['records'][0];
            $this->assertSame(['name' => 'www', 'type' => 'A', 'data' => '203.0.113.10', 'ttl' => 3600], $record);

            return new JsonMockResponse(['records' => []]);
        });

        $this->scaleway($http)->dns()->addRecord('example.com', 'www', 'A', '203.0.113.10');
    }

    public function testKubernetesKubeconfigPath(): void
    {
        $http = new MockHttpClient(function (string $method, string $url): JsonMockResponse {
            $this->assertStringEndsWith('/k8s/v1/regions/fr-par/clusters/cl-uuid/kubeconfig', $url);

            return new JsonMockResponse(['content' => 'base64', 'content_type' => 'yaml']);
        });

        $this->scaleway($http)->kubernetes()->kubeconfig('cl-uuid');
    }

    public function testBareMetalInstallPayload(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/baremetal/v1/zones/fr-par-1/servers/srv-uuid/install', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame('os-uuid', $body['os_id']);
            $this->assertSame(['key-1'], $body['ssh_key_ids']);

            return new JsonMockResponse(['id' => 'srv-uuid']);
        });

        $this->scaleway($http)->bareMetal()->install('srv-uuid', 'os-uuid', 'bm01', ['key-1']);
    }

    public function testFacadeCachesApiInstances(): void
    {
        $scaleway = $this->scaleway(new MockHttpClient());

        $this->assertSame($scaleway->instances(), $scaleway->instances());
        $this->assertSame($scaleway->dns(), $scaleway->dns());
        $this->assertSame($scaleway->kubernetes(), $scaleway->kubernetes());
    }
}
