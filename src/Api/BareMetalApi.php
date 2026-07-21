<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class BareMetalApi extends AbstractApi
{
    private const PRODUCT = 'baremetal';
    private const VERSION = 'v1';

    public function servers(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/servers', $zone), $query);
    }

    public function server(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/servers/'.$id, $zone));
    }

    public function createServer(string $offerId, string $name, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/servers', $zone), $this->withProject(array_merge($options, [
            'offer_id' => $offerId,
            'name' => $name,
        ]), 'project_id'));
    }

    public function waitForServerReady(string $id, float $timeout = 3600.0, float $interval = 10.0, ?string $zone = null): ApiResponse
    {
        return $this->waitUntil(
            fn (): ApiResponse => $this->server($id, $zone),
            static fn (ApiResponse $r): mixed => $r->data('status'),
            ['ready'],
            ['error', 'unknown'],
            $timeout,
            $interval,
            sprintf('elastic metal server %s', $id),
        );
    }

    public function updateServer(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/servers/'.$id, $zone), $fields);
    }

    public function deleteServer(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/servers/'.$id, $zone));
    }

    public function install(string $id, string $osId, string $hostname, array $sshKeyIds, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/install', $id), $zone), array_merge($options, [
            'os_id' => $osId,
            'hostname' => $hostname,
            'ssh_key_ids' => $sshKeyIds,
        ]));
    }

    public function start(string $id, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/start', $id), $zone));
    }

    public function stop(string $id, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/stop', $id), $zone));
    }

    public function reboot(string $id, string $bootType = 'normal', ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/reboot', $id), $zone), ['boot_type' => $bootType]);
    }

    public function metrics(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/servers/%s/metrics', $id), $zone));
    }

    public function offers(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/offers', $zone), $query);
    }

    public function oses(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/os', $zone), $query);
    }

    public function updateIp(string $serverId, string $ipId, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path(sprintf('/servers/%s/ips/%s', $serverId, $ipId), $zone), $fields);
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
