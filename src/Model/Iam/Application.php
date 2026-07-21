<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Application
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $organizationId = null,
        public ?bool $editable = null,
        public ?bool $deletable = null,
        public ?bool $managed = null,
        public ?int $nbApiKeys = null,
        public array $tags = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['editable']) ? (bool) $data['editable'] : null,
            isset($data['deletable']) ? (bool) $data['deletable'] : null,
            isset($data['managed']) ? (bool) $data['managed'] : null,
            isset($data['nb_api_keys']) && \is_numeric($data['nb_api_keys']) ? (int) $data['nb_api_keys'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            $data,
        );
    }
}
