<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class SecretManagerApi extends AbstractApi
{
    private const PRODUCT = 'secret-manager';
    private const VERSION = 'v1beta1';

    public function secrets(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/secrets', $region), $query);
    }

    public function secret(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/secrets/'.$id, $region));
    }

    public function createSecret(string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/secrets', $region), $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function deleteSecret(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/secrets/'.$id, $region));
    }

    public function versions(string $secretId, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/secrets/%s/versions', $secretId), $region), $query);
    }

    public function createVersion(string $secretId, string $plaintext, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/secrets/%s/versions', $secretId), $region), array_merge($options, [
            'data' => base64_encode($plaintext),
        ]));
    }

    public function accessVersion(string $secretId, string $revision = 'latest', ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/secrets/%s/versions/%s/access', $secretId, $revision), $region));
    }

    public function updateSecret(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/secrets/'.$id, $region), $fields);
    }

    public function deleteVersion(string $secretId, string $revision, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path(sprintf('/secrets/%s/versions/%s', $secretId, $revision), $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
