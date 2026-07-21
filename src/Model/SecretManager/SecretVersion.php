<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\SecretManager;

final readonly class SecretVersion
{
    public function __construct(
        public ?int $revision = null,
        public ?string $secretId = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $deletedAt = null,
        public ?string $description = null,
        public ?bool $latest = null,
        public ?array $ephemeralProperties = null,
        public ?string $deletionRequestedAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['revision']) && \is_numeric($data['revision']) ? (int) $data['revision'] : null,
            isset($data['secret_id']) && \is_scalar($data['secret_id']) ? (string) $data['secret_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['deleted_at']) && \is_scalar($data['deleted_at']) ? (string) $data['deleted_at'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['latest']) ? (bool) $data['latest'] : null,
            \is_array($data['ephemeral_properties'] ?? null) ? $data['ephemeral_properties'] : null,
            isset($data['deletion_requested_at']) && \is_scalar($data['deletion_requested_at']) ? (string) $data['deletion_requested_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
