<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\SecretManager;

final readonly class Secret
{
    public function __construct(
        public ?string $id = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $tags = [],
        public ?int $versionCount = null,
        public ?string $description = null,
        public ?bool $managed = null,
        public ?bool $protected = null,
        public ?string $type = null,
        public ?string $path = null,
        public ?array $ephemeralPolicy = null,
        public array $usedBy = [],
        public ?string $deletionRequestedAt = null,
        public ?string $keyId = null,
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
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['version_count']) && \is_numeric($data['version_count']) ? (int) $data['version_count'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['managed']) ? (bool) $data['managed'] : null,
            isset($data['protected']) ? (bool) $data['protected'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['path']) && \is_scalar($data['path']) ? (string) $data['path'] : null,
            \is_array($data['ephemeral_policy'] ?? null) ? $data['ephemeral_policy'] : null,
            \is_array($data['used_by'] ?? null) ? $data['used_by'] : [],
            isset($data['deletion_requested_at']) && \is_scalar($data['deletion_requested_at']) ? (string) $data['deletion_requested_at'] : null,
            isset($data['key_id']) && \is_scalar($data['key_id']) ? (string) $data['key_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
