<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class Pipeline
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $status = null,
        public array $errors = [],
        public ?string $projectId = null,
        public ?string $organizationId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['errors'] ?? null) ? $data['errors'] : [],
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
