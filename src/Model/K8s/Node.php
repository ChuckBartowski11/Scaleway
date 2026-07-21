<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class Node
{
    public function __construct(
        public ?string $id = null,
        public ?string $poolId = null,
        public ?string $clusterId = null,
        public ?string $providerId = null,
        public ?string $region = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['pool_id']) && \is_scalar($data['pool_id']) ? (string) $data['pool_id'] : null,
            isset($data['cluster_id']) && \is_scalar($data['cluster_id']) ? (string) $data['cluster_id'] : null,
            isset($data['provider_id']) && \is_scalar($data['provider_id']) ? (string) $data['provider_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
