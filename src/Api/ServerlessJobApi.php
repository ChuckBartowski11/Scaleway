<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class ServerlessJobApi extends AbstractApi
{
    private const PRODUCT = 'serverless-jobs';
    private const VERSION = 'v1alpha2';

    public function definitions(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/job-definitions', $region), $query);
    }

    public function definition(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/job-definitions/'.$id, $region));
    }

    public function createDefinition(string $name, string $imageUri, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/job-definitions', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'image_uri' => $imageUri,
        ]), 'project_id'));
    }

    public function updateDefinition(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/job-definitions/'.$id, $region), $fields);
    }

    public function deleteDefinition(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/job-definitions/'.$id, $region));
    }

    public function run(string $definitionId, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/job-definitions/%s/runs', $definitionId), $region), $options);
    }

    public function runs(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/job-runs', $region), $query);
    }

    public function runDetails(string $runId, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/job-runs/'.$runId, $region));
    }

    public function stopRun(string $runId, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/job-runs/%s/stop', $runId), $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
