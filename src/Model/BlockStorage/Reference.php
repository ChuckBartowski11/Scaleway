<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BlockStorage;

final readonly class Reference
{
    public function __construct(
        public ?string $id = null,
        public ?string $productResourceType = null,
        public ?string $productResourceId = null,
        public ?string $createdAt = null,
        public ?string $type = null,
        public ?string $status = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['product_resource_type']) && \is_scalar($data['product_resource_type']) ? (string) $data['product_resource_type'] : null,
            isset($data['product_resource_id']) && \is_scalar($data['product_resource_id']) ? (string) $data['product_resource_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            $data,
        );
    }
}
