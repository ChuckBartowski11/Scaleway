<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class SSHKey
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $publicKey = null,
        public ?string $fingerprint = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?bool $disabled = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['public_key']) && \is_scalar($data['public_key']) ? (string) $data['public_key'] : null,
            isset($data['fingerprint']) && \is_scalar($data['fingerprint']) ? (string) $data['fingerprint'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['disabled']) ? (bool) $data['disabled'] : null,
            $data,
        );
    }
}
