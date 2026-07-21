<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class PermissionSet
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $scopeType = null,
        public ?string $description = null,
        public array $categories = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['scope_type']) && \is_scalar($data['scope_type']) ? (string) $data['scope_type'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['categories'] ?? null) ? $data['categories'] : [],
            $data,
        );
    }
}
