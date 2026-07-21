<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BlockStorage;

final readonly class Snapshot
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?array $parentVolume = null,
        public ?int $size = null,
        public ?string $projectId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $references = [],
        public ?string $status = null,
        public array $tags = [],
        public ?string $zone = null,
        public ?string $class = null,
        public ?bool $public = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['parent_volume'] ?? null) ? $data['parent_volume'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['references'] ?? null) ? $data['references'] : [],
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['class']) && \is_scalar($data['class']) ? (string) $data['class'] : null,
            isset($data['public']) ? (bool) $data['public'] : null,
            $data,
        );
    }
}
