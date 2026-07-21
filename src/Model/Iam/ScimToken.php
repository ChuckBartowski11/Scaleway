<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class ScimToken
{
    public function __construct(
        public ?string $id = null,
        public ?string $scimId = null,
        public ?string $createdAt = null,
        public ?string $expiresAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['scim_id']) && \is_scalar($data['scim_id']) ? (string) $data['scim_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            $data,
        );
    }
}
