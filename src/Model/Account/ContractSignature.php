<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Account;

final readonly class ContractSignature
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $createdAt = null,
        public ?string $signedAt = null,
        public ?string $expiresAt = null,
        public ?array $contract = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['signed_at']) && \is_scalar($data['signed_at']) ? (string) $data['signed_at'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            \is_array($data['contract'] ?? null) ? $data['contract'] : null,
            $data,
        );
    }
}
