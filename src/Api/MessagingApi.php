<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class MessagingApi extends AbstractApi
{
    private const PRODUCT = 'mnq';
    private const VERSION = 'v1beta1';

    public function natsAccounts(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/nats-accounts', $region), $query);
    }

    public function createNatsAccount(string $name, array $options = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/nats-accounts', $region), $this->withProject(array_merge($options, ['name' => $name]), 'project_id'));
    }

    public function deleteNatsAccount(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/nats-accounts/'.$id, $region));
    }

    public function natsCredentials(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/nats-credentials', $region), $query);
    }

    public function createNatsCredentials(string $natsAccountId, string $name, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/nats-credentials', $region), [
            'nats_account_id' => $natsAccountId,
            'name' => $name,
        ]);
    }

    public function deleteNatsCredentials(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/nats-credentials/'.$id, $region));
    }

    public function activateQueues(?string $region = null): ApiResponse
    {
        return $this->post($this->path('/activate-sqs', $region), $this->withProject([], 'project_id'));
    }

    public function deactivateQueues(?string $region = null): ApiResponse
    {
        return $this->post($this->path('/deactivate-sqs', $region), $this->withProject([], 'project_id'));
    }

    public function queuesInfo(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/sqs-info', $region), $this->projectQuery());
    }

    public function queuesCredentials(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/sqs-credentials', $region), $query);
    }

    public function createQueuesCredentials(string $name, array $permissions = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/sqs-credentials', $region), $this->withProject(array_filter([
            'name' => $name,
            'permissions' => [] !== $permissions ? $permissions : null,
        ], static fn (mixed $v): bool => null !== $v), 'project_id'));
    }

    public function deleteQueuesCredentials(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/sqs-credentials/'.$id, $region));
    }

    public function activateTopics(?string $region = null): ApiResponse
    {
        return $this->post($this->path('/activate-sns', $region), $this->withProject([], 'project_id'));
    }

    public function deactivateTopics(?string $region = null): ApiResponse
    {
        return $this->post($this->path('/deactivate-sns', $region), $this->withProject([], 'project_id'));
    }

    public function topicsInfo(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/sns-info', $region), $this->projectQuery());
    }

    public function topicsCredentials(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/sns-credentials', $region), $query);
    }

    public function createTopicsCredentials(string $name, array $permissions = [], ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/sns-credentials', $region), $this->withProject(array_filter([
            'name' => $name,
            'permissions' => [] !== $permissions ? $permissions : null,
        ], static fn (mixed $v): bool => null !== $v), 'project_id'));
    }

    public function deleteTopicsCredentials(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/sns-credentials/'.$id, $region));
    }

    private function projectQuery(): array
    {
        $projectId = $this->client->getDefaultProjectId();

        return '' !== $projectId ? ['project_id' => $projectId] : [];
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
