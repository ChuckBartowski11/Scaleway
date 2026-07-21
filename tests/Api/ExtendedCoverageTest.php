<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Api;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Scaleway;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

final class ExtendedCoverageTest extends TestCase
{
    private function scaleway(MockHttpClient $http): Scaleway
    {
        return new Scaleway(new ScalewayClient('SCWKEY', defaultProjectId: 'proj-uuid', httpClient: $http));
    }

    public function testPublicGatewayPatRulePayload(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/vpc-gw/v2/zones/fr-par-1/pat-rules', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame(2222, $body['public_port']);
            $this->assertSame('192.168.1.10', $body['private_ip']);
            $this->assertSame('both', $body['protocol']);

            return new JsonMockResponse(['id' => 'pat-uuid'], ['http_code' => 201]);
        });

        $this->scaleway($http)->publicGateways()->createPatRule('gw-uuid', 2222, '192.168.1.10', 22);
    }

    public function testRedisCreateClusterInjectsProject(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/redis/v1/zones/fr-par-1/clusters', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame('proj-uuid', $body['project_id']);
            $this->assertSame('RED1-MICRO', $body['node_type']);

            return new JsonMockResponse(['id' => 'redis-uuid'], ['http_code' => 201]);
        });

        $this->scaleway($http)->redis()->createCluster('cache', '7.0.5', 'RED1-MICRO', 'admin', 'S3cret!');
    }

    public function testBlockStorageVolumeFromEmpty(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/block/v1alpha1/zones/fr-par-1/volumes', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame(['size' => 50_000_000_000], $body['from_empty']);
            $this->assertSame(5000, $body['perf_iops']);

            return new JsonMockResponse(['id' => 'vol-uuid'], ['http_code' => 201]);
        });

        $this->scaleway($http)->blockStorage()->createVolume('data', 50_000_000_000, 5000);
    }

    public function testTransactionalEmailSendPayload(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/tem/v1alpha1/regions/fr-par/emails', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame(['email' => 'noreply@example.com'], $body['from']);
            $this->assertSame([['email' => 'user@example.com']], $body['to']);
            $this->assertSame('Welcome', $body['subject']);
            $this->assertSame('proj-uuid', $body['project_id']);

            return new JsonMockResponse(['emails' => []]);
        });

        $this->scaleway($http)->transactionalEmail()->sendEmail('noreply@example.com', ['user@example.com'], 'Welcome', 'Hello!');
    }

    public function testSecretManagerAccessVersionPath(): void
    {
        $http = new MockHttpClient(function (string $method, string $url): JsonMockResponse {
            $this->assertStringEndsWith('/secret-manager/v1beta1/regions/fr-par/secrets/sec-uuid/versions/latest/access', $url);

            return new JsonMockResponse(['data' => base64_encode('hunter2'), 'revision' => 3]);
        });

        $response = $this->scaleway($http)->secrets()->accessVersion('sec-uuid');

        $this->assertSame('hunter2', base64_decode((string) $response->data('data')));
    }

    public function testServerlessContainerDeployPath(): void
    {
        $http = new MockHttpClient(function (string $method, string $url): JsonMockResponse {
            $this->assertSame('POST', $method);
            $this->assertStringEndsWith('/containers/v1beta1/regions/fr-par/containers/ct-uuid/deploy', $url);

            return new JsonMockResponse(['id' => 'ct-uuid']);
        });

        $this->scaleway($http)->containers()->deployContainer('ct-uuid');
    }

    public function testWebHostingCreatePayload(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringEndsWith('/webhosting/v1/regions/fr-par/hostings', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame('offer-uuid', $body['offer_id']);
            $this->assertSame('example.com', $body['domain']);

            return new JsonMockResponse(['id' => 'host-uuid'], ['http_code' => 201]);
        });

        $this->scaleway($http)->webHosting()->createHosting('offer-uuid', 'example.com', 'admin@example.com');
    }

    public function testInstancePlacementGroupAndCatalog(): void
    {
        $urls = [];
        $http = new MockHttpClient(function (string $method, string $url) use (&$urls): JsonMockResponse {
            $urls[] = $url;

            return new JsonMockResponse([]);
        });

        $scaleway = $this->scaleway($http);
        $scaleway->instances()->serverTypes();
        $scaleway->instances()->placementGroups();

        $this->assertStringEndsWith('/instance/v1/zones/fr-par-1/products/servers', $urls[0]);
        $this->assertStringEndsWith('/instance/v1/zones/fr-par-1/placement_groups', $urls[1]);
    }

    public function testDnsRegistrarDomainList(): void
    {
        $http = new MockHttpClient(function (string $method, string $url): JsonMockResponse {
            $this->assertStringEndsWith('/domain/v2beta1/domains', $url);

            return new JsonMockResponse(['domains' => [], 'total_count' => 0]);
        });

        $this->scaleway($http)->dns()->domains();
    }

    public function testNewModulesAreCached(): void
    {
        $scaleway = $this->scaleway(new MockHttpClient());

        $this->assertSame($scaleway->redis(), $scaleway->redis());
        $this->assertSame($scaleway->publicGateways(), $scaleway->publicGateways());
        $this->assertSame($scaleway->secrets(), $scaleway->secrets());
        $this->assertSame($scaleway->appleSilicon(), $scaleway->appleSilicon());
    }
}
