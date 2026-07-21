<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class Cluster
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public ?string $status = null,
        public ?string $version = null,
        public array $endpoints = [],
        public array $tags = [],
        public ?string $nodeType = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $tlsEnabled = null,
        public array $clusterSettings = [],
        public array $aclRules = [],
        public ?int $clusterSize = null,
        public ?string $zone = null,
        public ?string $userName = null,
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
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            \is_array($data['endpoints'] ?? null) ? $data['endpoints'] : [],
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['node_type']) && \is_scalar($data['node_type']) ? (string) $data['node_type'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['tls_enabled']) ? (bool) $data['tls_enabled'] : null,
            \is_array($data['cluster_settings'] ?? null) ? $data['cluster_settings'] : [],
            \is_array($data['acl_rules'] ?? null) ? $data['acl_rules'] : [],
            isset($data['cluster_size']) && \is_numeric($data['cluster_size']) ? (int) $data['cluster_size'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['user_name']) && \is_scalar($data['user_name']) ? (string) $data['user_name'] : null,
            \is_array($data['upgradable_versions'] ?? null) ? $data['upgradable_versions'] : [],
            $data,
        );
    }
}
