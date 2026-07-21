<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Registry;

final readonly class Image
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $namespaceId = null,
        public ?string $status = null,
        public ?string $statusMessage = null,
        public ?string $visibility = null,
        public ?int $size = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $tags = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['namespace_id']) && \is_scalar($data['namespace_id']) ? (string) $data['namespace_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['status_message']) && \is_scalar($data['status_message']) ? (string) $data['status_message'] : null,
            isset($data['visibility']) && \is_scalar($data['visibility']) ? (string) $data['visibility'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            $data,
        );
    }
}
