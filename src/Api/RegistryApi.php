<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class RegistryApi extends AbstractApi
{
    private const PRODUCT = 'registry';
    private const VERSION = 'v1';

    public function namespaces(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/namespaces', $region), $query);
    }

    public function namespace(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/namespaces/'.$id, $region));
    }

    public function createNamespace(string $name, bool $isPublic = false, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/namespaces', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'is_public' => $isPublic,
        ]), 'project_id'));
    }

    public function deleteNamespace(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/namespaces/'.$id, $region));
    }

    public function images(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/images', $region), $query);
    }

    public function deleteImage(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/images/'.$id, $region));
    }

    public function tags(string $imageId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/images/%s/tags', $imageId), $region), $query);
    }

    public function deleteTag(string $tagId, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/tags/'.$tagId, $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
