<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class Snapshot
{
    public function __construct(
        public ?string $id = null,
        public ?string $instanceId = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?int $sizeBytes = null,
        public ?string $expiresAt = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $instanceName = null,
        public ?string $nodeType = null,
        public ?string $volumeType = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['instance_id']) && \is_scalar($data['instance_id']) ? (string) $data['instance_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['size_bytes']) && \is_numeric($data['size_bytes']) ? (int) $data['size_bytes'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['instance_name']) && \is_scalar($data['instance_name']) ? (string) $data['instance_name'] : null,
            isset($data['node_type']) && \is_scalar($data['node_type']) ? (string) $data['node_type'] : null,
            isset($data['volume_type']) && \is_scalar($data['volume_type']) ? (string) $data['volume_type'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
