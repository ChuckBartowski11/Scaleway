<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class AccountApi extends AbstractApi
{
    private const BASE = '/account/v3';

    public function projects(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/projects', $query);
    }

    public function project(string $id): ApiResponse
    {
        return $this->get(self::BASE.'/projects/'.$id);
    }

    public function createProject(string $name, ?string $description = null): ApiResponse
    {
        return $this->post(self::BASE.'/projects', array_filter([
            'name' => $name,
            'description' => $description,
        ]));
    }

    public function updateProject(string $id, array $fields): ApiResponse
    {
        return $this->patch(self::BASE.'/projects/'.$id, $fields);
    }

    public function deleteProject(string $id): ApiResponse
    {
        return $this->delete(self::BASE.'/projects/'.$id);
    }
}
