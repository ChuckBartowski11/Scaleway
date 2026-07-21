<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Registry;

final readonly class NamespaceModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $status = null,
        public ?string $statusMessage = null,
        public ?string $endpoint = null,
        public ?bool $isPublic = null,
        public ?int $size = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?int $imageCount = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['status_message']) && \is_scalar($data['status_message']) ? (string) $data['status_message'] : null,
            isset($data['endpoint']) && \is_scalar($data['endpoint']) ? (string) $data['endpoint'] : null,
            isset($data['is_public']) ? (bool) $data['is_public'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['image_count']) && \is_numeric($data['image_count']) ? (int) $data['image_count'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
