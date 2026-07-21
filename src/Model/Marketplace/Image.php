<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Marketplace;

final readonly class Image
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $logo = null,
        public array $categories = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $validUntil = null,
        public ?string $label = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['logo']) && \is_scalar($data['logo']) ? (string) $data['logo'] : null,
            \is_array($data['categories'] ?? null) ? $data['categories'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['valid_until']) && \is_scalar($data['valid_until']) ? (string) $data['valid_until'] : null,
            isset($data['label']) && \is_scalar($data['label']) ? (string) $data['label'] : null,
            $data,
        );
    }
}
