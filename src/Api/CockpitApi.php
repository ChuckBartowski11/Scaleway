<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class CockpitApi extends AbstractApi
{
    private const BASE = '/cockpit/v1';

    public function grafanaUsers(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/grafana/users', $query);
    }

    public function createGrafanaUser(string $login, string $role = 'editor', array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/grafana/users', $this->withProject(array_merge($options, [
            'login' => $login,
            'role' => $role,
        ]), 'project_id'));
    }

    public function deleteGrafanaUser(string $id, array $query = []): ApiResponse
    {
        return $this->delete(sprintf('%s/grafana/users/%s', self::BASE, $id), $query);
    }

    public function productDashboards(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/grafana/product-dashboards', $query);
    }

    public function productDashboard(string $id, array $query = []): ApiResponse
    {
        return $this->get(sprintf('%s/grafana/product-dashboards/%s', self::BASE, $id), $query);
    }

    public function syncDatasources(array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/grafana/datasources/sync', $this->withProject($options, 'project_id'));
    }
}
