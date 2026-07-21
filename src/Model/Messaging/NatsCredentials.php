<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Messaging;

final readonly class NatsCredentials
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $natsAccountId = null,
        public ?string $region = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?array $credentials = null,
        public ?string $checksum = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['nats_account_id']) && \is_scalar($data['nats_account_id']) ? (string) $data['nats_account_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['credentials'] ?? null) ? $data['credentials'] : null,
            isset($data['checksum']) && \is_scalar($data['checksum']) ? (string) $data['checksum'] : null,
            $data,
        );
    }
}
