<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Tests\Api;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Scaleway;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;

final class FullCoverageTest extends TestCase
{
    private function scaleway(MockHttpClient $http): Scaleway
    {
        return new Scaleway(new ScalewayClient('SCWKEY', defaultProjectId: 'proj-uuid', httpClient: $http));
    }

    private function assertPath(string $expectedSuffix, callable $call, string $expectedMethod = 'GET'): void
    {
        $http = new MockHttpClient(function (string $method, string $url) use ($expectedSuffix, $expectedMethod): JsonMockResponse {
            $this->assertSame($expectedMethod, $method);
            $this->assertStringContainsString($expectedSuffix, $url);

            return new JsonMockResponse([]);
        });

        $call($this->scaleway($http));
    }

    public function testBlockStorageUsesV1WithSingularZoneSegment(): void
    {
        $this->assertPath('/block/v1/zone/fr-par-1/volumes', fn (Scaleway $s) => $s->blockStorage()->volumes());
    }

    public function testTransactionalEmailUsesFullSlug(): void
    {
        $this->assertPath('/transactional-email/v1alpha1/regions/fr-par/domains', fn (Scaleway $s) => $s->transactionalEmail()->domains());
    }

    public function testServerlessJobsRunPath(): void
    {
        $this->assertPath('/serverless-jobs/v1alpha2/regions/fr-par/job-definitions/jd-1/runs', fn (Scaleway $s) => $s->jobs()->run('jd-1'), 'POST');
    }

    public function testMongoDbInstancesPath(): void
    {
        $this->assertPath('/mongodb/v1/regions/fr-par/instances', fn (Scaleway $s) => $s->mongodb()->instances());
    }

    public function testServerlessSqlDatabasesPath(): void
    {
        $this->assertPath('/serverless-sqldb/v1alpha1/regions/fr-par/databases', fn (Scaleway $s) => $s->serverlessSql()->databases());
    }

    public function testKeyManagerEncryptEncodesPlaintext(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringContainsString('/key-manager/v1alpha1/regions/fr-par/keys/k-1/encrypt', $url);
            $body = json_decode($options['body'], true);
            $this->assertSame(base64_encode('secret data'), $body['plaintext']);

            return new JsonMockResponse(['ciphertext' => 'x']);
        });

        $this->scaleway($http)->keyManager()->encrypt('k-1', 'secret data');
    }

    public function testEdgeServicesIsGlobal(): void
    {
        $http = new MockHttpClient(function (string $method, string $url): JsonMockResponse {
            $this->assertSame('https://api.scaleway.com/edge-services/v1beta1/pipelines', $url);

            return new JsonMockResponse(['pipelines' => []]);
        });

        $this->scaleway($http)->edgeServices()->pipelines();
    }

    public function testMessagingActivateQueuesInjectsProject(): void
    {
        $http = new MockHttpClient(function (string $method, string $url, array $options): JsonMockResponse {
            $this->assertStringContainsString('/mnq/v1beta1/regions/fr-par/activate-sqs', $url);
            $this->assertJsonStringEqualsJsonString('{"project_id":"proj-uuid"}', $options['body']);

            return new JsonMockResponse([]);
        });

        $this->scaleway($http)->messaging()->activateQueues();
    }

    public function testAutoscalingIsZonal(): void
    {
        $this->assertPath('/autoscaling/v1alpha1/zones/fr-par-1/instance-groups', fn (Scaleway $s) => $s->autoscaling()->instanceGroups());
    }

    public function testFlexibleIpAttachServer(): void
    {
        $this->assertPath('/flexible-ip/v1alpha1/zones/fr-par-1/fips/fip-1/attach-server', fn (Scaleway $s) => $s->flexibleIps()->attachToServer('fip-1', 'srv-1'), 'POST');
    }

    public function testMarketplaceIsGlobal(): void
    {
        $this->assertPath('/marketplace/v2/images', fn (Scaleway $s) => $s->marketplace()->images());
    }

    public function testIotHubsPath(): void
    {
        $this->assertPath('/iot/v1/regions/fr-par/hubs', fn (Scaleway $s) => $s->iot()->hubs());
    }

    public function testAuditTrailEventsPath(): void
    {
        $this->assertPath('/audit-trail/v1alpha1/regions/fr-par/events', fn (Scaleway $s) => $s->auditTrail()->events());
    }

    public function testInferenceDeploymentsPath(): void
    {
        $this->assertPath('/inference/v1/regions/fr-par/deployments', fn (Scaleway $s) => $s->inference()->deployments());
    }

    public function testFileStoragePath(): void
    {
        $this->assertPath('/file/v1alpha1/regions/fr-par/filesystems', fn (Scaleway $s) => $s->fileStorage()->filesystems());
    }

    public function testCockpitGrafanaUsersPath(): void
    {
        $this->assertPath('/cockpit/v1/grafana/users', fn (Scaleway $s) => $s->cockpit()->grafanaUsers());
    }

    public function testWebHostingBackupRestore(): void
    {
        $this->assertPath('/webhosting/v1/regions/fr-par/hostings/h-1/backups/b-1/restore', fn (Scaleway $s) => $s->webHosting()->restoreBackup('h-1', 'b-1'), 'POST');
    }
}
