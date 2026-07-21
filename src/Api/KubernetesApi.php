<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class KubernetesApi extends AbstractApi
{
    private const PRODUCT = 'k8s';
    private const VERSION = 'v1';

    public function clusters(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/clusters', $region), $query);
    }

    public function cluster(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/clusters/'.$id, $region));
    }

    public function createCluster(string $name, string $version, string $cni, array $pools, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/clusters', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'version' => $version,
            'cni' => $cni,
            'pools' => $pools,
        ]), 'project_id'));
    }

    public function waitForClusterReady(string $id, float $timeout = 900.0, float $interval = 5.0, ?string $region = null): ApiResponse
    {
        return $this->waitUntil(
            fn (): ApiResponse => $this->cluster($id, $region),
            static fn (ApiResponse $r): mixed => $r->data('status'),
            ['ready'],
            ['error'],
            $timeout,
            $interval,
            sprintf('kubernetes cluster %s', $id),
        );
    }

    public function updateCluster(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/clusters/'.$id, $region), $fields);
    }

    public function upgradeCluster(string $id, string $version, bool $upgradePools = true, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/clusters/%s/upgrade', $id), $region), [
            'version' => $version,
            'upgrade_pools' => $upgradePools,
        ]);
    }

    public function deleteCluster(string $id, bool $withAdditionalResources = false, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/clusters/'.$id, $region), [
            'with_additional_resources' => $withAdditionalResources ? 'true' : 'false',
        ]);
    }

    public function kubeconfig(string $clusterId, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/clusters/%s/kubeconfig', $clusterId), $region));
    }

    public function pools(string $clusterId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/clusters/%s/pools', $clusterId), $region), $query);
    }

    public function createPool(string $clusterId, string $name, string $nodeType, int $size, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/clusters/%s/pools', $clusterId), $region), array_merge($options, [
            'name' => $name,
            'node_type' => $nodeType,
            'size' => $size,
        ]));
    }

    public function updatePool(string $poolId, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/pools/'.$poolId, $region), $fields);
    }

    public function deletePool(string $poolId, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/pools/'.$poolId, $region));
    }

    public function nodes(string $clusterId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/clusters/%s/nodes', $clusterId), $region), $query);
    }

    public function replaceNode(string $nodeId, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/nodes/%s/replace', $nodeId), $region));
    }

    public function rebootNode(string $nodeId, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/nodes/%s/reboot', $nodeId), $region));
    }

    public function versions(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/versions', $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
