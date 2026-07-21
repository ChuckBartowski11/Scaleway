<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class DatabaseBackup
{
    public function __construct(
        public ?string $id = null,
        public ?string $instanceId = null,
        public ?string $databaseName = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?int $size = null,
        public ?string $expiresAt = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $instanceName = null,
        public ?string $downloadUrl = null,
        public ?string $downloadUrlExpiresAt = null,
        public ?string $region = null,
        public ?bool $sameRegion = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['instance_id']) && \is_scalar($data['instance_id']) ? (string) $data['instance_id'] : null,
            isset($data['database_name']) && \is_scalar($data['database_name']) ? (string) $data['database_name'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['instance_name']) && \is_scalar($data['instance_name']) ? (string) $data['instance_name'] : null,
            isset($data['download_url']) && \is_scalar($data['download_url']) ? (string) $data['download_url'] : null,
            isset($data['download_url_expires_at']) && \is_scalar($data['download_url_expires_at']) ? (string) $data['download_url_expires_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['same_region']) ? (bool) $data['same_region'] : null,
            $data,
        );
    }
}
