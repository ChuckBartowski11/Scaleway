<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class APIKey
{
    public function __construct(
        public ?string $accessKey = null,
        public ?string $secretKey = null,
        public ?string $applicationId = null,
        public ?string $userId = null,
        public ?string $description = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $expiresAt = null,
        public ?string $defaultProjectId = null,
        public ?bool $editable = null,
        public ?bool $deletable = null,
        public ?bool $managed = null,
        public ?string $creationIp = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['access_key']) && \is_scalar($data['access_key']) ? (string) $data['access_key'] : null,
            isset($data['secret_key']) && \is_scalar($data['secret_key']) ? (string) $data['secret_key'] : null,
            isset($data['application_id']) && \is_scalar($data['application_id']) ? (string) $data['application_id'] : null,
            isset($data['user_id']) && \is_scalar($data['user_id']) ? (string) $data['user_id'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            isset($data['default_project_id']) && \is_scalar($data['default_project_id']) ? (string) $data['default_project_id'] : null,
            isset($data['editable']) ? (bool) $data['editable'] : null,
            isset($data['deletable']) ? (bool) $data['deletable'] : null,
            isset($data['managed']) ? (bool) $data['managed'] : null,
            isset($data['creation_ip']) && \is_scalar($data['creation_ip']) ? (string) $data['creation_ip'] : null,
            $data,
        );
    }
}
