<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class Instance
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public ?string $organizationId = null,
        public ?string $status = null,
        public ?string $version = null,
        public array $tags = [],
        public ?int $nodeAmount = null,
        public ?string $nodeType = null,
        public ?array $volume = null,
        public array $endpoints = [],
        public ?string $createdAt = null,
        public ?string $region = null,
        public ?array $snapshotSchedule = null,
        public array $settings = [],
        public array $maintenances = [],
        public array $upgradableVersions = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['node_amount']) && \is_numeric($data['node_amount']) ? (int) $data['node_amount'] : null,
            isset($data['node_type']) && \is_scalar($data['node_type']) ? (string) $data['node_type'] : null,
            \is_array($data['volume'] ?? null) ? $data['volume'] : null,
            \is_array($data['endpoints'] ?? null) ? $data['endpoints'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['snapshot_schedule'] ?? null) ? $data['snapshot_schedule'] : null,
            \is_array($data['settings'] ?? null) ? $data['settings'] : [],
            \is_array($data['maintenances'] ?? null) ? $data['maintenances'] : [],
            \is_array($data['upgradable_versions'] ?? null) ? $data['upgradable_versions'] : [],
            $data,
        );
    }
}
