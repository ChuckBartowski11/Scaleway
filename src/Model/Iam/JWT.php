<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class JWT
{
    public function __construct(
        public ?string $jti = null,
        public ?string $issuerId = null,
        public ?string $audienceId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $expiresAt = null,
        public ?string $ip = null,
        public ?string $userAgent = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['jti']) && \is_scalar($data['jti']) ? (string) $data['jti'] : null,
            isset($data['issuer_id']) && \is_scalar($data['issuer_id']) ? (string) $data['issuer_id'] : null,
            isset($data['audience_id']) && \is_scalar($data['audience_id']) ? (string) $data['audience_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            isset($data['user_agent']) && \is_scalar($data['user_agent']) ? (string) $data['user_agent'] : null,
            $data,
        );
    }
}
