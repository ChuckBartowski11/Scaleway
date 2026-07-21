<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class VpcApi extends AbstractApi
{
    private const PRODUCT = 'vpc';
    private const VERSION = 'v2';

    public function vpcs(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/vpcs', $region), $query);
    }

    public function vpc(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/vpcs/'.$id, $region));
    }

    public function createVpc(string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/vpcs', $region), $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function deleteVpc(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/vpcs/'.$id, $region));
    }

    public function privateNetworks(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/private-networks', $region), $query);
    }

    public function privateNetwork(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/private-networks/'.$id, $region));
    }

    public function createPrivateNetwork(string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/private-networks', $region), $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function updatePrivateNetwork(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/private-networks/'.$id, $region), $fields);
    }

    public function deletePrivateNetwork(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/private-networks/'.$id, $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
