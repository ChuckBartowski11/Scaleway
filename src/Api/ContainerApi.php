<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class ContainerApi extends AbstractApi
{
    private const BASE = 'containers';
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

    public function containers(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/containers', $region), $query);
    }

    public function container(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/containers/'.$id, $region));
    }

    public function createContainer(string $namespaceId, string $name, string $registryImage, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/containers', $region), array_merge($options, [
            'namespace_id' => $namespaceId,
            'name' => $name,
            'registry_image' => $registryImage,
        ]));
    }

    public function updateContainer(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/containers/'.$id, $region), $fields);
    }

    public function deployContainer(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/containers/%s/deploy', $id), $region));
    }

    public function deleteContainer(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/containers/'.$id, $region));
    }

    public function domains(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/domains', $region), $query);
    }

    public function createDomain(string $containerId, string $hostname, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/domains', $region), [
            'container_id' => $containerId,
            'hostname' => $hostname,
        ]);
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::BASE, self::VERSION, $suffix, $region);
    }
}
