<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class AuditTrailApi extends AbstractApi
{
    private const PRODUCT = 'audit-trail';
    private const VERSION = 'v1alpha1';

    public function events(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/events', $region), $query);
    }

    public function authenticationEvents(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/authentication-events', $region), $query);
    }

    public function systemEvents(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/system-events', $region), $query);
    }

    public function products(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/events/products', $region));
    }

    public function createExport(array $options, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/events/export', $region), $this->withProject($options, 'project_id'));
    }

    public function deleteExport(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/events/export/'.$id, $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
