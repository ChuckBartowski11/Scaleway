<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class InferenceApi extends AbstractApi
{
    private const PRODUCT = 'inference';
    private const VERSION = 'v1';

    public function deployments(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/deployments', $region), $query);
    }

    public function deployment(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/deployments/'.$id, $region));
    }

    public function createDeployment(string $name, string $modelId, string $nodeTypeName, array $endpoints, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/deployments', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'model_id' => $modelId,
            'node_type_name' => $nodeTypeName,
            'endpoints' => $endpoints,
        ]), 'project_id'));
    }

    public function updateDeployment(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/deployments/'.$id, $region), $fields);
    }

    public function deleteDeployment(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/deployments/'.$id, $region));
    }

    public function models(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/models', $region), $query);
    }

    public function model(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/models/'.$id, $region));
    }

    public function importModel(array $source, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/models', $region), $this->withProject(array_merge($options, ['source' => $source]), 'project_id'));
    }

    public function deleteModel(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/models/'.$id, $region));
    }

    public function nodeTypes(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/node-types', $region));
    }

    public function createEndpoint(string $deploymentId, array $endpoint, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/endpoints', $region), [
            'deployment_id' => $deploymentId,
            'endpoint' => $endpoint,
        ]);
    }

    public function deleteEndpoint(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/endpoints/'.$id, $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
