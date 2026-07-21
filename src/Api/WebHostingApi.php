<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class WebHostingApi extends AbstractApi
{
    private const PRODUCT = 'webhosting';
    private const VERSION = 'v1';

    public function hostings(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/hostings', $region), $query);
    }

    public function hosting(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/hostings/'.$id, $region));
    }

    public function createHosting(string $offerId, string $domain, string $email, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/hostings', $region), $this->withProject(array_merge($options, [
            'offer_id' => $offerId,
            'domain' => $domain,
            'email' => $email,
        ]), 'project_id'));
    }

    public function updateHosting(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/hostings/'.$id, $region), $fields);
    }

    public function deleteHosting(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/hostings/'.$id, $region));
    }

    public function offers(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/offers', $region), $query);
    }

    public function controlPanels(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/control-panels', $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
