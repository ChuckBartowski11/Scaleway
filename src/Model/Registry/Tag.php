<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Registry;

final readonly class Tag
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $imageId = null,
        public ?string $status = null,
        public ?string $digest = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['image_id']) && \is_scalar($data['image_id']) ? (string) $data['image_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['digest']) && \is_scalar($data['digest']) ? (string) $data['digest'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
