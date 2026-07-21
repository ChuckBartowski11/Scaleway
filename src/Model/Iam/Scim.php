<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Scim
{
    public function __construct(
        public ?string $id = null,
        public ?string $createdAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            $data,
        );
    }
}
