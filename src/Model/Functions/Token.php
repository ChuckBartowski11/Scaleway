<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Functions;

final readonly class Token
{
    public function __construct(
        public ?string $id = null,
        public ?string $token = null,
        public ?string $functionId = null,
        public ?string $namespaceId = null,
        public ?string $publicKey = null,
        public ?string $status = null,
        public ?string $description = null,
        public ?string $expiresAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['token']) && \is_scalar($data['token']) ? (string) $data['token'] : null,
            isset($data['function_id']) && \is_scalar($data['function_id']) ? (string) $data['function_id'] : null,
            isset($data['namespace_id']) && \is_scalar($data['namespace_id']) ? (string) $data['namespace_id'] : null,
            isset($data['public_key']) && \is_scalar($data['public_key']) ? (string) $data['public_key'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            $data,
        );
    }
}
