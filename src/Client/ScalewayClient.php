<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Client;

use ChuckBartowski\ScalewaySdk\Exception\AuthenticationException;
use ChuckBartowski\ScalewaySdk\Exception\TransportException;
use ChuckBartowski\ScalewaySdk\Response\ApiResponse;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ScalewayClient
{
    private const BASE_URL = 'https://api.scaleway.com';

    private readonly HttpClientInterface $httpClient;

    public function __construct(
        #[\SensitiveParameter]
        private readonly string $secretKey,
        private readonly string $defaultProjectId = '',
        private readonly string $defaultZone = 'fr-par-1',
        private readonly string $defaultRegion = 'fr-par',
        private readonly float $timeout = 30.0,
        ?HttpClientInterface $httpClient = null,
    ) {
        $this->httpClient = $httpClient ?? HttpClient::create();
    }

    public function getDefaultProjectId(): string
    {
        return $this->defaultProjectId;
    }

    public function getDefaultZone(): string
    {
        return $this->defaultZone;
    }

    public function getDefaultRegion(): string
    {
        return $this->defaultRegion;
    }

    public function get(string $path, array $query = []): ApiResponse
    {
        return $this->request('GET', $path, $query);
    }

    public function post(string $path, array $json = []): ApiResponse
    {
        return $this->request('POST', $path, [], $json);
    }

    public function put(string $path, array $json = []): ApiResponse
    {
        return $this->request('PUT', $path, [], $json);
    }

    public function patch(string $path, array $json = []): ApiResponse
    {
        return $this->request('PATCH', $path, [], $json);
    }

    public function delete(string $path, array $query = []): ApiResponse
    {
        return $this->request('DELETE', $path, $query);
    }

    private function request(string $method, string $path, array $query = [], ?array $json = null): ApiResponse
    {
        if ('' === $this->secretKey) {
            throw new AuthenticationException('Missing Scaleway secret key');
        }

        $options = [
            'headers' => ['X-Auth-Token' => $this->secretKey],
            'query' => $query,
            'timeout' => $this->timeout,
        ];

        if (null !== $json) {
            $options['json'] = $json;
        }

        try {
            $response = $this->httpClient->request($method, self::BASE_URL.$path, $options);
            $statusCode = $response->getStatusCode();

            if (401 === $statusCode) {
                throw new AuthenticationException(sprintf('Scaleway authentication failed (HTTP %d)', $statusCode));
            }

            $content = $response->getContent(false);
        } catch (TransportExceptionInterface $e) {
            throw new TransportException($e->getMessage(), 0, $e);
        }

        return ApiResponse::fromHttp($statusCode, $this->decode($content));
    }

    private function decode(string $content): mixed
    {
        if ('' === $content) {
            return null;
        }

        try {
            return json_decode($content, true, 512, \JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new TransportException('Invalid JSON response from the Scaleway API', 0, $e);
        }
    }
}
