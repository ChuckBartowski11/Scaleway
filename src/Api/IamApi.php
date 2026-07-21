<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class IamApi extends AbstractApi
{
    private const BASE = '/iam/v1alpha1';

    public function apiKeys(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/api-keys', $query);
    }

    public function createApiKey(array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/api-keys', $options);
    }

    public function deleteApiKey(string $accessKey): ApiResponse
    {
        return $this->delete(self::BASE.'/api-keys/'.rawurlencode($accessKey));
    }

    public function sshKeys(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/ssh-keys', $query);
    }

    public function createSshKey(string $name, string $publicKey, ?string $projectId = null): ApiResponse
    {
        return $this->post(self::BASE.'/ssh-keys', $this->withProject(array_filter([
            'name' => $name,
            'public_key' => $publicKey,
            'project_id' => $projectId,
        ]), 'project_id'));
    }

    public function deleteSshKey(string $id): ApiResponse
    {
        return $this->delete(self::BASE.'/ssh-keys/'.$id);
    }

    public function users(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/users', $query);
    }

    public function applications(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/applications', $query);
    }

    public function createApplication(string $name, array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/applications', array_merge($options, ['name' => $name]));
    }

    public function policies(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/policies', $query);
    }

    public function createPolicy(string $name, array $rules, array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/policies', array_merge($options, [
            'name' => $name,
            'rules' => $rules,
        ]));
    }

    public function deletePolicy(string $id): ApiResponse
    {
        return $this->delete(self::BASE.'/policies/'.$id);
    }
}
