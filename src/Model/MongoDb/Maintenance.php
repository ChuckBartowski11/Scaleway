<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class Maintenance
{
    public function __construct(
        public ?string $id = null,
        public ?string $instanceId = null,
        public ?string $createdAt = null,
        public ?string $startsAt = null,
        public ?string $stopsAt = null,
        public ?string $status = null,
        public ?string $forcedAt = null,
        public ?string $appliedAt = null,
        public ?string $appliedBy = null,
        public ?array $workflow = null,
        public ?string $reason = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['instance_id']) && \is_scalar($data['instance_id']) ? (string) $data['instance_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['starts_at']) && \is_scalar($data['starts_at']) ? (string) $data['starts_at'] : null,
            isset($data['stops_at']) && \is_scalar($data['stops_at']) ? (string) $data['stops_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['forced_at']) && \is_scalar($data['forced_at']) ? (string) $data['forced_at'] : null,
            isset($data['applied_at']) && \is_scalar($data['applied_at']) ? (string) $data['applied_at'] : null,
            isset($data['applied_by']) && \is_scalar($data['applied_by']) ? (string) $data['applied_by'] : null,
            \is_array($data['workflow'] ?? null) ? $data['workflow'] : null,
            isset($data['reason']) && \is_scalar($data['reason']) ? (string) $data['reason'] : null,
            $data,
        );
    }
}
