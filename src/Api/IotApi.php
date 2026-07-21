<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class IotApi extends AbstractApi
{
    private const PRODUCT = 'iot';
    private const VERSION = 'v1';

    public function hubs(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/hubs', $region), $query);
    }

    public function hub(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/hubs/'.$id, $region));
    }

    public function createHub(string $name, string $productPlan = 'plan_shared', array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/hubs', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'product_plan' => $productPlan,
        ]), 'project_id'));
    }

    public function updateHub(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/hubs/'.$id, $region), $fields);
    }

    public function deleteHub(string $id, bool $deleteDevices = false, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/hubs/'.$id, $region), ['delete_devices' => $deleteDevices ? 'true' : 'false']);
    }

    public function enableHub(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/hubs/%s/enable', $id), $region));
    }

    public function disableHub(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/hubs/%s/disable', $id), $region));
    }

    public function hubMetrics(string $id, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/hubs/%s/metrics', $id), $region), $query);
    }

    public function devices(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/devices', $region), $query);
    }

    public function device(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/devices/'.$id, $region));
    }

    public function createDevice(string $hubId, string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/devices', $region), array_merge($options, [
            'hub_id' => $hubId,
            'name' => $name,
        ]));
    }

    public function updateDevice(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/devices/'.$id, $region), $fields);
    }

    public function deleteDevice(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/devices/'.$id, $region));
    }

    public function enableDevice(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/devices/%s/enable', $id), $region));
    }

    public function disableDevice(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/devices/%s/disable', $id), $region));
    }

    public function deviceCertificate(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/devices/%s/certificate', $id), $region));
    }

    public function renewDeviceCertificate(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/devices/%s/renew-certificate', $id), $region));
    }

    public function routes(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/routes', $region), $query);
    }

    public function createRoute(string $hubId, string $name, string $topic, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/routes', $region), array_merge($options, [
            'hub_id' => $hubId,
            'name' => $name,
            'topic' => $topic,
        ]));
    }

    public function deleteRoute(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/routes/'.$id, $region));
    }

    public function networks(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/networks', $region), $query);
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
