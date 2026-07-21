<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class InstanceApi extends AbstractApi
{
    private const PRODUCT = 'instance';
    private const VERSION = 'v1';

    public function servers(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/servers', $zone), $query);
    }

    public function server(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/servers/'.$id, $zone));
    }

    public function createServer(string $name, string $commercialType, string $image, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/servers', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'commercial_type' => $commercialType,
            'image' => $image,
        ])));
    }

    public function updateServer(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/servers/'.$id, $zone), $fields);
    }

    public function deleteServer(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/servers/'.$id, $zone));
    }

    public function serverAction(string $id, string $action, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/action', $id), $zone), array_merge($options, ['action' => $action]));
    }

    public function powerOn(string $id, ?string $zone = null): ApiResponse
    {
        return $this->serverAction($id, 'poweron', [], $zone);
    }

    public function powerOff(string $id, ?string $zone = null): ApiResponse
    {
        return $this->serverAction($id, 'poweroff', [], $zone);
    }

    public function reboot(string $id, ?string $zone = null): ApiResponse
    {
        return $this->serverAction($id, 'reboot', [], $zone);
    }

    public function terminate(string $id, ?string $zone = null): ApiResponse
    {
        return $this->serverAction($id, 'terminate', [], $zone);
    }

    public function backup(string $id, ?string $name = null, ?string $zone = null): ApiResponse
    {
        return $this->serverAction($id, 'backup', array_filter(['name' => $name]), $zone);
    }

    public function userData(string $serverId, string $key, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/servers/%s/user_data/%s', $serverId, rawurlencode($key)), $zone));
    }

    public function volumes(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/volumes', $zone), $query);
    }

    public function volume(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/volumes/'.$id, $zone));
    }

    public function createVolume(string $name, string $volumeType, int $sizeBytes, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/volumes', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'volume_type' => $volumeType,
            'size' => $sizeBytes,
        ])));
    }

    public function updateVolume(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/volumes/'.$id, $zone), $fields);
    }

    public function deleteVolume(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/volumes/'.$id, $zone));
    }

    public function snapshots(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/snapshots', $zone), $query);
    }

    public function createSnapshot(string $volumeId, string $name, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/snapshots', $zone), $this->withProject(array_merge($options, [
            'volume_id' => $volumeId,
            'name' => $name,
        ])));
    }

    public function deleteSnapshot(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/snapshots/'.$id, $zone));
    }

    public function images(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/images', $zone), $query);
    }

    public function createImage(string $name, string $rootVolumeId, string $arch = 'x86_64', array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/images', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'root_volume' => $rootVolumeId,
            'arch' => $arch,
        ])));
    }

    public function deleteImage(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/images/'.$id, $zone));
    }

    public function ips(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/ips', $zone), $query);
    }

    public function createIp(array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/ips', $zone), $this->withProject($options));
    }

    public function attachIp(string $ipId, string $serverId, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/ips/'.$ipId, $zone), ['server' => $serverId]);
    }

    public function detachIp(string $ipId, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/ips/'.$ipId, $zone), ['server' => null]);
    }

    public function deleteIp(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/ips/'.$id, $zone));
    }

    public function securityGroups(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/security_groups', $zone), $query);
    }

    public function createSecurityGroup(string $name, string $description = '', array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/security_groups', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'description' => $description,
        ])));
    }

    public function deleteSecurityGroup(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/security_groups/'.$id, $zone));
    }

    public function securityGroupRules(string $groupId, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/security_groups/%s/rules', $groupId), $zone));
    }

    public function createSecurityGroupRule(string $groupId, array $rule, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/security_groups/%s/rules', $groupId), $zone), $rule);
    }

    public function privateNics(string $serverId, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/servers/%s/private_nics', $serverId), $zone));
    }

    public function createPrivateNic(string $serverId, string $privateNetworkId, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/servers/%s/private_nics', $serverId), $zone), array_merge($options, [
            'private_network_id' => $privateNetworkId,
        ]));
    }

    public function deletePrivateNic(string $serverId, string $nicId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/servers/%s/private_nics/%s', $serverId, $nicId), $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
