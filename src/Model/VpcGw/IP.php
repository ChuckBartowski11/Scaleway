<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\VpcGw;

final readonly class IP
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $tags = [],
        public ?string $address = null,
        public ?string $reverse = null,
        public ?string $gatewayId = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['address']) && \is_scalar($data['address']) ? (string) $data['address'] : null,
            isset($data['reverse']) && \is_scalar($data['reverse']) ? (string) $data['reverse'] : null,
            isset($data['gateway_id']) && \is_scalar($data['gateway_id']) ? (string) $data['gateway_id'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
