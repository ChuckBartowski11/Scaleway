<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class FlexibleIpApi extends AbstractApi
{
    private const PRODUCT = 'flexible-ip';
    private const VERSION = 'v1alpha1';

    public function ips(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/fips', $zone), $query);
    }

    public function ip(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/fips/'.$id, $zone));
    }

    public function createIp(array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/fips', $zone), $this->withProject($options, 'project_id'));
    }

    public function updateIp(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/fips/'.$id, $zone), $fields);
    }

    public function deleteIp(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/fips/'.$id, $zone));
    }

    public function attachToServer(string $ipId, string $serverId, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/fips/%s/attach-server', $ipId), $zone), ['server_id' => $serverId]);
    }

    public function detachFromServer(string $ipId, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/fips/%s/detach-server', $ipId), $zone));
    }

    public function generateMac(string $ipId, string $macType = 'kvm', ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/fips/%s/mac', $ipId), $zone), ['mac_type' => $macType]);
    }

    public function deleteMac(string $ipId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/fips/%s/mac', $ipId), $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
