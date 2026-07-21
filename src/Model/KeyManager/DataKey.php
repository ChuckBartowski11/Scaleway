<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\KeyManager;

final readonly class DataKey
{
    public function __construct(
        public ?string $keyId = null,
        public ?string $algorithm = null,
        public ?string $ciphertext = null,
        public ?array $plaintext = null,
        public ?string $createdAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['key_id']) && \is_scalar($data['key_id']) ? (string) $data['key_id'] : null,
            isset($data['algorithm']) && \is_scalar($data['algorithm']) ? (string) $data['algorithm'] : null,
            isset($data['ciphertext']) && \is_scalar($data['ciphertext']) ? (string) $data['ciphertext'] : null,
            \is_array($data['plaintext'] ?? null) ? $data['plaintext'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            $data,
        );
    }
}
