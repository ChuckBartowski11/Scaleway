<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class Pool
{
    public function __construct(
        public ?string $id = null,
        public ?string $clusterId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $version = null,
        public ?string $nodeType = null,
        public ?bool $autoscaling = null,
        public ?int $size = null,
        public ?int $minSize = null,
        public ?int $maxSize = null,
        public ?string $containerRuntime = null,
        public ?bool $autohealing = null,
        public array $tags = [],
        public ?string $placementGroupId = null,
        public ?array $kubeletArgs = null,
        public ?array $upgradePolicy = null,
        public ?string $zone = null,
        public ?string $rootVolumeType = null,
        public ?int $rootVolumeSize = null,
        public ?bool $publicIpDisabled = null,
        public ?string $securityGroupId = null,
        public ?array $labels = null,
        public array $taints = [],
        public array $startupTaints = [],
        public ?string $errorMessage = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['cluster_id']) && \is_scalar($data['cluster_id']) ? (string) $data['cluster_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['node_type']) && \is_scalar($data['node_type']) ? (string) $data['node_type'] : null,
            isset($data['autoscaling']) ? (bool) $data['autoscaling'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['min_size']) && \is_numeric($data['min_size']) ? (int) $data['min_size'] : null,
            isset($data['max_size']) && \is_numeric($data['max_size']) ? (int) $data['max_size'] : null,
            isset($data['container_runtime']) && \is_scalar($data['container_runtime']) ? (string) $data['container_runtime'] : null,
            isset($data['autohealing']) ? (bool) $data['autohealing'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['placement_group_id']) && \is_scalar($data['placement_group_id']) ? (string) $data['placement_group_id'] : null,
            \is_array($data['kubelet_args'] ?? null) ? $data['kubelet_args'] : null,
            \is_array($data['upgrade_policy'] ?? null) ? $data['upgrade_policy'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['root_volume_type']) && \is_scalar($data['root_volume_type']) ? (string) $data['root_volume_type'] : null,
            isset($data['root_volume_size']) && \is_numeric($data['root_volume_size']) ? (int) $data['root_volume_size'] : null,
            isset($data['public_ip_disabled']) ? (bool) $data['public_ip_disabled'] : null,
            isset($data['security_group_id']) && \is_scalar($data['security_group_id']) ? (string) $data['security_group_id'] : null,
            \is_array($data['labels'] ?? null) ? $data['labels'] : null,
            \is_array($data['taints'] ?? null) ? $data['taints'] : [],
            \is_array($data['startup_taints'] ?? null) ? $data['startup_taints'] : [],
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
