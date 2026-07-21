<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class ExportJob
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $name = null,
        public ?array $s3 = null,
        public ?string $createdAt = null,
        public ?string $lastRunAt = null,
        public array $tags = [],
        public ?array $lastStatus = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['s3'] ?? null) ? $data['s3'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['last_run_at']) && \is_scalar($data['last_run_at']) ? (string) $data['last_run_at'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['last_status'] ?? null) ? $data['last_status'] : null,
            $data,
        );
    }
}
