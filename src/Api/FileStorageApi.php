<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class FileStorageApi extends AbstractApi
{
    private const PRODUCT = 'file';
    private const VERSION = 'v1alpha1';

    public function filesystems(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/filesystems', $region), $query);
    }

    public function filesystem(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/filesystems/'.$id, $region));
    }

    public function createFilesystem(string $name, int $sizeBytes, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/filesystems', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'size' => $sizeBytes,
        ]), 'project_id'));
    }

    public function updateFilesystem(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/filesystems/'.$id, $region), $fields);
    }

    public function deleteFilesystem(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/filesystems/'.$id, $region));
    }

    public function attachments(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/attachments', $region), $query);
    }

    public function filesystemTypes(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/filesystem-types', $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
