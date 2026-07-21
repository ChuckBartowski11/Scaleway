<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class RdbApi extends AbstractApi
{
    private const PRODUCT = 'rdb';
    private const VERSION = 'v1';

    public function instances(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/instances', $region), $query);
    }

    public function instance(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/instances/'.$id, $region));
    }

    public function createInstance(string $name, string $engine, string $nodeType, string $userName, string $password, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/instances', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'engine' => $engine,
            'node_type' => $nodeType,
            'user_name' => $userName,
            'password' => $password,
        ]), 'project_id'));
    }

    public function updateInstance(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/instances/'.$id, $region), $fields);
    }

    public function deleteInstance(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/instances/'.$id, $region));
    }

    public function databases(string $instanceId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instances/%s/databases', $instanceId), $region), $query);
    }

    public function createDatabase(string $instanceId, string $name, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/databases', $instanceId), $region), ['name' => $name]);
    }

    public function deleteDatabase(string $instanceId, string $name, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/instances/%s/databases/%s', $instanceId, rawurlencode($name)), $region));
    }

    public function users(string $instanceId, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instances/%s/users', $instanceId), $region));
    }

    public function createUser(string $instanceId, string $name, string $password, bool $admin = false, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/instances/%s/users', $instanceId), $region), [
            'name' => $name,
            'password' => $password,
            'is_admin' => $admin,
        ]);
    }

    public function updateUser(string $instanceId, string $name, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path(sprintf('/instances/%s/users/%s', $instanceId, rawurlencode($name)), $region), $fields);
    }

    public function deleteUser(string $instanceId, string $name, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/instances/%s/users/%s', $instanceId, rawurlencode($name)), $region));
    }

    public function setPrivilege(string $instanceId, string $databaseName, string $userName, string $permission, ?string $region = null): ApiResponse
    {
        return $this->put($this->path(sprintf('/instances/%s/privileges', $instanceId), $region), [
            'database_name' => $databaseName,
            'user_name' => $userName,
            'permission' => $permission,
        ]);
    }

    public function backups(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/backups', $region), $query);
    }

    public function createBackup(string $instanceId, string $databaseName, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/backups', $region), array_merge($options, [
            'instance_id' => $instanceId,
            'database_name' => $databaseName,
        ]));
    }

    public function restoreBackup(string $backupId, string $instanceId, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/backups/%s/restore', $backupId), $region), array_merge($options, [
            'instance_id' => $instanceId,
        ]));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
