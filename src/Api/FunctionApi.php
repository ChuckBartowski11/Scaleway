<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class FunctionApi extends AbstractApi
{
    private const BASE = 'functions';
    private const VERSION = 'v1beta1';

    public function namespaces(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/namespaces', $region), $query);
    }

    public function createNamespace(string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/namespaces', $region), $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function deleteNamespace(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/namespaces/'.$id, $region));
    }

    public function functions(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/functions', $region), $query);
    }

    public function function(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/functions/'.$id, $region));
    }

    public function createFunction(string $namespaceId, string $name, string $runtime, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/functions', $region), array_merge($options, [
            'namespace_id' => $namespaceId,
            'name' => $name,
            'runtime' => $runtime,
        ]));
    }

    public function updateFunction(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/functions/'.$id, $region), $fields);
    }

    public function uploadUrl(string $functionId, int $contentLength, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/functions/%s/upload-url', $functionId), $region), ['content_length' => $contentLength]);
    }

    public function deployFunction(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/functions/%s/deploy', $id), $region));
    }

    public function deleteFunction(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/functions/'.$id, $region));
    }

    public function runtimes(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/runtimes', $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::BASE, self::VERSION, $suffix, $region);
    }
}
