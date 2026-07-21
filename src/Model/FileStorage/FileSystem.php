<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\FileStorage;

final readonly class FileSystem
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?int $size = null,
        public ?string $status = null,
        public ?string $projectId = null,
        public ?string $organizationId = null,
        public array $tags = [],
        public ?int $numberOfAttachments = null,
        public ?string $region = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $filesystemTypeId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['number_of_attachments']) && \is_numeric($data['number_of_attachments']) ? (int) $data['number_of_attachments'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['filesystem_type_id']) && \is_scalar($data['filesystem_type_id']) ? (string) $data['filesystem_type_id'] : null,
            $data,
        );
    }
}
