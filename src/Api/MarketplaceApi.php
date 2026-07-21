<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class MarketplaceApi extends AbstractApi
{
    private const BASE = '/marketplace/v2';

    public function images(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/images', $query);
    }

    public function image(string $id): ApiResponse
    {
        return $this->get(self::BASE.'/images/'.$id);
    }

    public function imageVersions(string $imageId): ApiResponse
    {
        return $this->get(sprintf('%s/images/%s/versions', self::BASE, $imageId));
    }

    public function localImages(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/local-images', $query);
    }

    public function localImage(string $id): ApiResponse
    {
        return $this->get(self::BASE.'/local-images/'.$id);
    }

    public function categories(): ApiResponse
    {
        return $this->get(self::BASE.'/categories');
    }
}
