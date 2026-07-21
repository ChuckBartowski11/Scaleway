<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class Instance
{
    public function __construct(
        public ?string $createdAt = null,
        public ?array $volume = null,
        public ?string $region = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $status = null,
        public ?string $engine = null,
        public array $upgradableVersion = [],
        public ?array $endpoint = null,
        public array $tags = [],
        public array $settings = [],
        public ?array $backupSchedule = null,
        public ?bool $isHaCluster = null,
        public array $readReplicas = [],
        public ?string $nodeType = null,
        public array $initSettings = [],
        public array $endpoints = [],
        public ?array $logsPolicy = null,
        public ?bool $backupSameRegion = null,
        public array $maintenances = [],
        public ?array $encryption = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            \is_array($data['volume'] ?? null) ? $data['volume'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['engine']) && \is_scalar($data['engine']) ? (string) $data['engine'] : null,
            \is_array($data['upgradable_version'] ?? null) ? $data['upgradable_version'] : [],
            \is_array($data['endpoint'] ?? null) ? $data['endpoint'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['settings'] ?? null) ? $data['settings'] : [],
            \is_array($data['backup_schedule'] ?? null) ? $data['backup_schedule'] : null,
            isset($data['is_ha_cluster']) ? (bool) $data['is_ha_cluster'] : null,
            \is_array($data['read_replicas'] ?? null) ? $data['read_replicas'] : [],
            isset($data['node_type']) && \is_scalar($data['node_type']) ? (string) $data['node_type'] : null,
            \is_array($data['init_settings'] ?? null) ? $data['init_settings'] : [],
            \is_array($data['endpoints'] ?? null) ? $data['endpoints'] : [],
            \is_array($data['logs_policy'] ?? null) ? $data['logs_policy'] : null,
            isset($data['backup_same_region']) ? (bool) $data['backup_same_region'] : null,
            \is_array($data['maintenances'] ?? null) ? $data['maintenances'] : [],
            \is_array($data['encryption'] ?? null) ? $data['encryption'] : null,
            $data,
        );
    }
}
