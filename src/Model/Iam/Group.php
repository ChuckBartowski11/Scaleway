<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Group
{
    public function __construct(
        public ?string $id = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $organizationId = null,
        public ?string $name = null,
        public ?string $description = null,
        public array $userIds = [],
        public array $applicationIds = [],
        public array $tags = [],
        public ?bool $editable = null,
        public ?bool $deletable = null,
        public ?bool $managed = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['user_ids'] ?? null) ? $data['user_ids'] : [],
            \is_array($data['application_ids'] ?? null) ? $data['application_ids'] : [],
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['editable']) ? (bool) $data['editable'] : null,
            isset($data['deletable']) ? (bool) $data['deletable'] : null,
            isset($data['managed']) ? (bool) $data['managed'] : null,
            $data,
        );
    }
}
