<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\KeyManager;

final readonly class Key
{
    public function __construct(
        public ?string $id = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public ?array $usage = null,
        public ?string $state = null,
        public ?int $rotationCount = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $protected = null,
        public ?bool $locked = null,
        public ?string $description = null,
        public array $tags = [],
        public ?string $rotatedAt = null,
        public ?array $rotationPolicy = null,
        public ?string $origin = null,
        public ?string $deletionRequestedAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['usage'] ?? null) ? $data['usage'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            isset($data['rotation_count']) && \is_numeric($data['rotation_count']) ? (int) $data['rotation_count'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['protected']) ? (bool) $data['protected'] : null,
            isset($data['locked']) ? (bool) $data['locked'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['rotated_at']) && \is_scalar($data['rotated_at']) ? (string) $data['rotated_at'] : null,
            \is_array($data['rotation_policy'] ?? null) ? $data['rotation_policy'] : null,
            isset($data['origin']) && \is_scalar($data['origin']) ? (string) $data['origin'] : null,
            isset($data['deletion_requested_at']) && \is_scalar($data['deletion_requested_at']) ? (string) $data['deletion_requested_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
