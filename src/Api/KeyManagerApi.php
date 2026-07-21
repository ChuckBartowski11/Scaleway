<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class KeyManagerApi extends AbstractApi
{
    private const PRODUCT = 'key-manager';
    private const VERSION = 'v1alpha1';

    public function keys(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/keys', $region), $query);
    }

    public function key(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/keys/'.$id, $region));
    }

    public function createKey(string $name, array $usage, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/keys', $region), $this->withProject(array_merge($options, [
            'name' => $name,
            'usage' => $usage,
        ]), 'project_id'));
    }

    public function updateKey(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/keys/'.$id, $region), $fields);
    }

    public function deleteKey(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/keys/'.$id, $region));
    }

    public function encrypt(string $keyId, string $plaintext, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/encrypt', $keyId), $region), array_merge($options, [
            'plaintext' => base64_encode($plaintext),
        ]));
    }

    public function decrypt(string $keyId, string $ciphertext, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/decrypt', $keyId), $region), array_merge($options, [
            'ciphertext' => $ciphertext,
        ]));
    }

    public function generateDataKey(string $keyId, string $algorithm = 'aes_256_gcm', bool $withoutPlaintext = false, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/generate-data-key', $keyId), $region), [
            'algorithm' => $algorithm,
            'without_plaintext' => $withoutPlaintext,
        ]);
    }

    public function rotateKey(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/rotate', $id), $region));
    }

    public function sign(string $keyId, string $digest, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/sign', $keyId), $region), ['digest' => $digest]);
    }

    public function verify(string $keyId, string $digest, string $signature, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/verify', $keyId), $region), [
            'digest' => $digest,
            'signature' => $signature,
        ]);
    }

    public function enableKey(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/enable', $id), $region));
    }

    public function disableKey(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/keys/%s/disable', $id), $region));
    }

    public function publicKey(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/keys/%s/public-key', $id), $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
