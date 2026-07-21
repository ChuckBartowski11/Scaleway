<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class AppleSiliconApi extends AbstractApi
{
    private const PRODUCT = 'apple-silicon';
    private const VERSION = 'v1alpha1';

    public function servers(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/servers', $zone), $query);
    }

    public function server(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/servers/'.$id, $zone));
    }

    public function createServer(string $type, ?string $name = null, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/servers', $zone), $this->withProject(array_merge($options, array_filter([
            'type' => $type,
            'name' => $name,
        ])), 'project_id'));
    }

    public function deleteServer(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/servers/'.$id, $zone));
    }

    public function rebootServer(string $id, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/reboot', $id), $zone));
    }

    public function reinstallServer(string $id, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/reinstall', $id), $zone));
    }

    public function serverTypes(?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/server-types', $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
