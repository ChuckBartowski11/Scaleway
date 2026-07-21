<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Messaging;

final readonly class SqsCredentials
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public ?string $region = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $accessKey = null,
        public ?string $secretKey = null,
        public ?string $secretChecksum = null,
        public ?array $permissions = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['access_key']) && \is_scalar($data['access_key']) ? (string) $data['access_key'] : null,
            isset($data['secret_key']) && \is_scalar($data['secret_key']) ? (string) $data['secret_key'] : null,
            isset($data['secret_checksum']) && \is_scalar($data['secret_checksum']) ? (string) $data['secret_checksum'] : null,
            \is_array($data['permissions'] ?? null) ? $data['permissions'] : null,
            $data,
        );
    }
}
