<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class AutoscalingApi extends AbstractApi
{
    private const PRODUCT = 'autoscaling';
    private const VERSION = 'v1alpha1';

    public function instanceGroups(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/instance-groups', $zone), $query);
    }

    public function instanceGroup(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/instance-groups/'.$id, $zone));
    }

    public function createInstanceGroup(string $name, string $templateId, array $capacity, array $loadBalancer = [], array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/instance-groups', $zone), $this->withProject(array_merge($options, array_filter([
            'name' => $name,
            'template_id' => $templateId,
            'capacity' => $capacity,
            'loadbalancer' => [] !== $loadBalancer ? $loadBalancer : null,
        ], static fn (mixed $v): bool => null !== $v)), 'project_id'));
    }

    public function updateInstanceGroup(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/instance-groups/'.$id, $zone), $fields);
    }

    public function deleteInstanceGroup(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/instance-groups/'.$id, $zone));
    }

    public function instanceGroupEvents(string $id, array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/instance-groups/%s/events', $id), $zone), $query);
    }

    public function templates(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/instance-templates', $zone), $query);
    }

    public function createTemplate(string $name, string $commercialType, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/instance-templates', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'commercial_type' => $commercialType,
        ]), 'project_id'));
    }

    public function updateTemplate(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/instance-templates/'.$id, $zone), $fields);
    }

    public function deleteTemplate(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/instance-templates/'.$id, $zone));
    }

    public function policies(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/instance-policies', $zone), $query);
    }

    public function createPolicy(string $instanceGroupId, string $name, string $action, string $type, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/instance-policies', $zone), array_merge($options, [
            'instance_group_id' => $instanceGroupId,
            'name' => $name,
            'action' => $action,
            'type' => $type,
        ]));
    }

    public function updatePolicy(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/instance-policies/'.$id, $zone), $fields);
    }

    public function deletePolicy(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/instance-policies/'.$id, $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
