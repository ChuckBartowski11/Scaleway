<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Autoscaling;

final readonly class InstanceTemplate
{
    public function __construct(
        public ?string $id = null,
        public ?string $commercialType = null,
        public ?string $imageId = null,
        public ?array $volumes = null,
        public array $tags = [],
        public ?string $securityGroupId = null,
        public ?string $placementGroupId = null,
        public ?int $publicIpsV4Count = null,
        public ?int $publicIpsV6Count = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public array $privateNetworkIds = [],
        public ?string $status = null,
        public ?string $cloudInit = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['commercial_type']) && \is_scalar($data['commercial_type']) ? (string) $data['commercial_type'] : null,
            isset($data['image_id']) && \is_scalar($data['image_id']) ? (string) $data['image_id'] : null,
            \is_array($data['volumes'] ?? null) ? $data['volumes'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['security_group_id']) && \is_scalar($data['security_group_id']) ? (string) $data['security_group_id'] : null,
            isset($data['placement_group_id']) && \is_scalar($data['placement_group_id']) ? (string) $data['placement_group_id'] : null,
            isset($data['public_ips_v4_count']) && \is_numeric($data['public_ips_v4_count']) ? (int) $data['public_ips_v4_count'] : null,
            isset($data['public_ips_v6_count']) && \is_numeric($data['public_ips_v6_count']) ? (int) $data['public_ips_v6_count'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['private_network_ids'] ?? null) ? $data['private_network_ids'] : [],
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['cloud_init']) && \is_scalar($data['cloud_init']) ? (string) $data['cloud_init'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
