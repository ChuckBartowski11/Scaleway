<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Acl
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?array $match = null,
        public ?array $action = null,
        public ?array $frontend = null,
        public ?int $index = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $description = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['match'] ?? null) ? $data['match'] : null,
            \is_array($data['action'] ?? null) ? $data['action'] : null,
            \is_array($data['frontend'] ?? null) ? $data['frontend'] : null,
            isset($data['index']) && \is_numeric($data['index']) ? (int) $data['index'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            $data,
        );
    }
}
