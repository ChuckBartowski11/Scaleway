<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class Deployment
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public ?string $status = null,
        public array $tags = [],
        public ?string $nodeTypeName = null,
        public array $endpoints = [],
        public ?int $size = null,
        public ?int $minSize = null,
        public ?int $maxSize = null,
        public ?string $errorMessage = null,
        public ?string $modelId = null,
        public ?array $quantization = null,
        public ?string $modelName = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['node_type_name']) && \is_scalar($data['node_type_name']) ? (string) $data['node_type_name'] : null,
            \is_array($data['endpoints'] ?? null) ? $data['endpoints'] : [],
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['min_size']) && \is_numeric($data['min_size']) ? (int) $data['min_size'] : null,
            isset($data['max_size']) && \is_numeric($data['max_size']) ? (int) $data['max_size'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['model_id']) && \is_scalar($data['model_id']) ? (string) $data['model_id'] : null,
            \is_array($data['quantization'] ?? null) ? $data['quantization'] : null,
            isset($data['model_name']) && \is_scalar($data['model_name']) ? (string) $data['model_name'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
