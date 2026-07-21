<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class IpamApi extends AbstractApi
{
    private const PRODUCT = 'ipam';
    private const VERSION = 'v1';

    public function ips(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/ips', $region), $query);
    }

    public function ip(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/ips/'.$id, $region));
    }

    public function bookIp(array $source, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/ips', $region), $this->withProject(array_merge($options, ['source' => $source]), 'project_id'));
    }

    public function updateIp(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/ips/'.$id, $region), $fields);
    }

    public function releaseIp(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/ips/'.$id, $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
