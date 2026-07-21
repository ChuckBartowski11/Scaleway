<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class GracePeriod
{
    public function __construct(
        public ?string $type = null,
        public ?string $createdAt = null,
        public ?string $expiresAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            $data,
        );
    }
}
