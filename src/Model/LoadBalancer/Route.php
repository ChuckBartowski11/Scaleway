<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Route
{
    public function __construct(
        public ?string $id = null,
        public ?string $frontendId = null,
        public ?string $backendId = null,
        public ?array $match = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['frontend_id']) && \is_scalar($data['frontend_id']) ? (string) $data['frontend_id'] : null,
            isset($data['backend_id']) && \is_scalar($data['backend_id']) ? (string) $data['backend_id'] : null,
            \is_array($data['match'] ?? null) ? $data['match'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
