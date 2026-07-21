<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BlockStorage;

final readonly class Volume
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?int $size = null,
        public ?string $projectId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $references = [],
        public ?string $parentSnapshotId = null,
        public ?string $status = null,
        public array $tags = [],
        public ?string $zone = null,
        public ?array $specs = null,
        public ?string $lastDetachedAt = null,
        public ?string $kmsKeyId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['references'] ?? null) ? $data['references'] : [],
            isset($data['parent_snapshot_id']) && \is_scalar($data['parent_snapshot_id']) ? (string) $data['parent_snapshot_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            \is_array($data['specs'] ?? null) ? $data['specs'] : null,
            isset($data['last_detached_at']) && \is_scalar($data['last_detached_at']) ? (string) $data['last_detached_at'] : null,
            isset($data['kms_key_id']) && \is_scalar($data['kms_key_id']) ? (string) $data['kms_key_id'] : null,
            $data,
        );
    }
}
