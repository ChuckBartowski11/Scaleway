<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class RedisApi extends AbstractApi
{
    private const PRODUCT = 'redis';
    private const VERSION = 'v1';

    public function clusters(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/clusters', $zone), $query);
    }

    public function cluster(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/clusters/'.$id, $zone));
    }

    public function createCluster(string $name, string $version, string $nodeType, string $userName, string $password, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/clusters', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'version' => $version,
            'node_type' => $nodeType,
            'user_name' => $userName,
            'password' => $password,
        ]), 'project_id'));
    }

    public function updateCluster(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/clusters/'.$id, $zone), $fields);
    }

    public function migrateCluster(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/clusters/%s/migrate', $id), $zone), $fields);
    }

    public function deleteCluster(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/clusters/'.$id, $zone));
    }

    public function addAclRules(string $clusterId, array $rules, ?string $zone = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/clusters/%s/acls', $clusterId), $zone), ['acl_rules' => $rules]);
    }

    public function deleteAclRule(string $aclId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/acls/'.$aclId, $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
