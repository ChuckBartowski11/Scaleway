<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\ServerlessSql;

final readonly class DatabaseBackup
{
    public function __construct(
        public ?string $id = null,
        public ?string $status = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $databaseId = null,
        public ?string $createdAt = null,
        public ?string $expiresAt = null,
        public ?int $size = null,
        public ?int $dbSize = null,
        public ?string $downloadUrl = null,
        public ?string $downloadUrlExpiresAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['database_id']) && \is_scalar($data['database_id']) ? (string) $data['database_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['db_size']) && \is_numeric($data['db_size']) ? (int) $data['db_size'] : null,
            isset($data['download_url']) && \is_scalar($data['download_url']) ? (string) $data['download_url'] : null,
            isset($data['download_url_expires_at']) && \is_scalar($data['download_url_expires_at']) ? (string) $data['download_url_expires_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
