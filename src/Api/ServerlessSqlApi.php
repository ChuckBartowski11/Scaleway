<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class ServerlessSqlApi extends AbstractApi
{
    private const PRODUCT = 'serverless-sqldb';
    private const VERSION = 'v1alpha1';

    public function databases(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/databases', $region), $query);
    }

    public function database(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/databases/'.$id, $region));
    }

    public function createDatabase(string $name, int $cpuMin = 0, int $cpuMax = 15, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/databases', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'cpu_min' => $cpuMin,
            'cpu_max' => $cpuMax,
        ]), 'project_id'));
    }

    public function updateDatabase(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/databases/'.$id, $region), $fields);
    }

    public function deleteDatabase(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/databases/'.$id, $region));
    }

    public function restoreDatabase(string $id, string $backupId, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/databases/%s/restore', $id), $region), ['backup_id' => $backupId]);
    }

    public function backups(string $databaseId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/databases/%s/backups', $databaseId), $region), $query);
    }

    public function exportBackup(string $databaseId, string $backupId, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/databases/%s/backups/%s/export', $databaseId, $backupId), $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
