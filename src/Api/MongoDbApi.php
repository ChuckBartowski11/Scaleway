<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class MongoDbApi extends AbstractApi
{
    private const PRODUCT = 'mongodb';
    private const VERSION = 'v1';

    public function instances(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/instances', $region), $query);
    }

    public function instance(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/instances/'.$id, $region));
    }

    public function createInstance(string $name, string $version, string $nodeType, int $nodeNumber, string $userName, string $password, array $volume, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/instances', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'version' => $version,
            'node_type' => $nodeType,
            'node_number' => $nodeNumber,
            'user_name' => $userName,
            'password' => $password,
            'volume' => $volume,
        ]), 'project_id'));
    }

    public function updateInstance(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/instances/'.$id, $region), $fields);
    }

    public function upgradeInstance(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/upgrade', $id), $region), $fields);
    }

    public function deleteInstance(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/instances/'.$id, $region));
    }

    public function certificate(string $instanceId, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instances/%s/certificate', $instanceId), $region));
    }

    public function nodeTypes(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/node-types', $region));
    }

    public function versions(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/versions', $region));
    }

    public function snapshots(string $instanceId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instances/%s/snapshots', $instanceId), $region), $query);
    }

    public function createSnapshot(string $instanceId, string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/snapshots', $instanceId), $region), array_merge($options, ['name' => $name]));
    }

    public function deleteSnapshot(string $instanceId, string $snapshotId, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/instances/%s/snapshots/%s', $instanceId, $snapshotId), $region));
    }

    public function restoreSnapshot(string $instanceId, string $snapshotId, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/snapshots/%s/restore', $instanceId, $snapshotId), $region), $options);
    }

    public function users(string $instanceId, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instances/%s/users', $instanceId), $region));
    }

    public function createUser(string $instanceId, string $name, string $password, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/users', $instanceId), $region), [
            'name' => $name,
            'password' => $password,
        ]);
    }

    public function deleteUser(string $instanceId, string $name, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/instances/%s/users/%s', $instanceId, rawurlencode($name)), $region));
    }

    public function databases(string $instanceId, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instances/%s/databases', $instanceId), $region));
    }

    public function createEndpoint(string $instanceId, array $endpoint, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/endpoints', $instanceId), $region), ['endpoint' => $endpoint]);
    }

    public function deleteEndpoint(string $instanceId, string $endpointId, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/instances/%s/endpoints/%s', $instanceId, $endpointId), $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
