<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class Model
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public array $tags = [],
        public ?string $status = null,
        public ?string $description = null,
        public ?string $errorMessage = null,
        public ?bool $hasEula = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $region = null,
        public array $nodesSupport = [],
        public ?int $parameterSizeBits = null,
        public ?int $sizeBytes = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['has_eula']) ? (bool) $data['has_eula'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['nodes_support'] ?? null) ? $data['nodes_support'] : [],
            isset($data['parameter_size_bits']) && \is_numeric($data['parameter_size_bits']) ? (int) $data['parameter_size_bits'] : null,
            isset($data['size_bytes']) && \is_numeric($data['size_bytes']) ? (int) $data['size_bytes'] : null,
            $data,
        );
    }
}
