<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class EdgeServicesApi extends AbstractApi
{
    private const BASE = '/edge-services/v1beta1';

    public function pipelines(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/pipelines', $query);
    }

    public function pipeline(string $id): ApiResponse
    {
        return $this->get(self::BASE.'/pipelines/'.$id);
    }

    public function createPipeline(string $name, array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/pipelines', $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function updatePipeline(string $id, array $fields): ApiResponse
    {
        return $this->patch(self::BASE.'/pipelines/'.$id, $fields);
    }

    public function deletePipeline(string $id): ApiResponse
    {
        return $this->delete(self::BASE.'/pipelines/'.$id);
    }

    public function backendStages(string $pipelineId): ApiResponse
    {
        return $this->get(sprintf('%s/pipelines/%s/backend-stages', self::BASE, $pipelineId));
    }

    public function createBackendStage(string $pipelineId, array $config): ApiResponse
    {
        return $this->post(sprintf('%s/pipelines/%s/backend-stages', self::BASE, $pipelineId), $config);
    }

    public function cacheStages(string $pipelineId): ApiResponse
    {
        return $this->get(sprintf('%s/pipelines/%s/cache-stages', self::BASE, $pipelineId));
    }

    public function createCacheStage(string $pipelineId, array $config): ApiResponse
    {
        return $this->post(sprintf('%s/pipelines/%s/cache-stages', self::BASE, $pipelineId), $config);
    }

    public function tlsStages(string $pipelineId): ApiResponse
    {
        return $this->get(sprintf('%s/pipelines/%s/tls-stages', self::BASE, $pipelineId));
    }

    public function createTlsStage(string $pipelineId, array $config): ApiResponse
    {
        return $this->post(sprintf('%s/pipelines/%s/tls-stages', self::BASE, $pipelineId), $config);
    }

    public function dnsStages(string $pipelineId): ApiResponse
    {
        return $this->get(sprintf('%s/pipelines/%s/dns-stages', self::BASE, $pipelineId));
    }

    public function createDnsStage(string $pipelineId, array $config): ApiResponse
    {
        return $this->post(sprintf('%s/pipelines/%s/dns-stages', self::BASE, $pipelineId), $config);
    }

    public function purgeRequests(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/purge-requests', $query);
    }

    public function createPurgeRequest(string $pipelineId, ?array $assets = null): ApiResponse
    {
        $payload = ['pipeline_id' => $pipelineId];

        if (null === $assets) {
            $payload['all'] = true;
        } else {
            $payload['assets'] = $assets;
        }

        return $this->post(self::BASE.'/purge-requests', $payload);
    }

    public function plans(): ApiResponse
    {
        return $this->get(self::BASE.'/plans');
    }
}
