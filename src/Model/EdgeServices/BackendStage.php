<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class BackendStage
{
    public function __construct(
        public ?string $id = null,
        public ?string $pipelineId = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?array $scalewayS3 = null,
        public ?array $scalewayLb = null,
        public ?array $scalewayServerlessContainer = null,
        public ?array $scalewayServerlessFunction = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['pipeline_id']) && \is_scalar($data['pipeline_id']) ? (string) $data['pipeline_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['scaleway_s3'] ?? null) ? $data['scaleway_s3'] : null,
            \is_array($data['scaleway_lb'] ?? null) ? $data['scaleway_lb'] : null,
            \is_array($data['scaleway_serverless_container'] ?? null) ? $data['scaleway_serverless_container'] : null,
            \is_array($data['scaleway_serverless_function'] ?? null) ? $data['scaleway_serverless_function'] : null,
            $data,
        );
    }
}
