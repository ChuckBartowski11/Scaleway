<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class LoadBalancerApi extends AbstractApi
{
    private const PRODUCT = 'lb';
    private const VERSION = 'v1';

    public function loadBalancers(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/lbs', $zone), $query);
    }

    public function loadBalancer(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/lbs/'.$id, $zone));
    }

    public function createLoadBalancer(string $name, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/lbs', $zone), $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function deleteLoadBalancer(string $id, bool $releaseIp = false, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/lbs/'.$id, $zone), ['release_ip' => $releaseIp ? 'true' : 'false']);
    }

    public function backends(string $lbId, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/lbs/%s/backends', $lbId), $zone));
    }

    public function createBackend(string $lbId, string $name, string $forwardProtocol, int $forwardPort, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/lbs/%s/backends', $lbId), $zone), array_merge($options, [
            'name' => $name,
            'forward_protocol' => $forwardProtocol,
            'forward_port' => $forwardPort,
        ]));
    }

    public function updateBackend(string $backendId, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->put($this->path('/backends/'.$backendId, $zone), $fields);
    }

    public function deleteBackend(string $backendId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/backends/'.$backendId, $zone));
    }

    public function setBackendServers(string $backendId, array $serverIps, ?string $zone = null): ApiResponse
    {
        return $this->put($this->path(sprintf('/backends/%s/servers', $backendId), $zone), ['server_ip' => $serverIps]);
    }

    public function frontends(string $lbId, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/lbs/%s/frontends', $lbId), $zone));
    }

    public function createFrontend(string $lbId, string $name, int $inboundPort, string $backendId, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/lbs/%s/frontends', $lbId), $zone), array_merge($options, [
            'name' => $name,
            'inbound_port' => $inboundPort,
            'backend_id' => $backendId,
        ]));
    }

    public function deleteFrontend(string $frontendId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/frontends/'.$frontendId, $zone));
    }

    public function certificates(string $lbId, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/lbs/%s/certificates', $lbId), $zone));
    }

    public function createCertificate(string $lbId, string $name, array $options, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/lbs/%s/certificates', $lbId), $zone), array_merge($options, ['name' => $name]));
    }

    public function deleteCertificate(string $certificateId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/certificates/'.$certificateId, $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
