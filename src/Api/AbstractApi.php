<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

abstract class AbstractApi
{
    public function __construct(protected readonly ScalewayClient $client)
    {
    }

    protected function get(string $path, array $query = []): ApiResponse
    {
        return $this->client->get($path, $query)->ensureSuccess();
    }

    protected function post(string $path, array $json = []): ApiResponse
    {
        return $this->client->post($path, $json)->ensureSuccess();
    }

    protected function put(string $path, array $json = []): ApiResponse
    {
        return $this->client->put($path, $json)->ensureSuccess();
    }

    protected function patch(string $path, array $json = []): ApiResponse
    {
        return $this->client->patch($path, $json)->ensureSuccess();
    }

    protected function delete(string $path, array $query = []): ApiResponse
    {
        return $this->client->delete($path, $query)->ensureSuccess();
    }

    protected function zonal(string $product, string $version, string $path, ?string $zone = null): string
    {
        return sprintf('/%s/%s/zones/%s%s', $product, $version, $zone ?? $this->client->getDefaultZone(), $path);
    }

    protected function regional(string $product, string $version, string $path, ?string $region = null): string
    {
        return sprintf('/%s/%s/regions/%s%s', $product, $version, $region ?? $this->client->getDefaultRegion(), $path);
    }

    protected function withProject(array $payload, string $key = 'project'): array
    {
        if (!isset($payload[$key]) && '' !== $this->client->getDefaultProjectId()) {
            $payload[$key] = $this->client->getDefaultProjectId();
        }

        return $payload;
    }
}
