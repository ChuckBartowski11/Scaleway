<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class RouteStage
{
    public function __construct(
        public ?string $id = null,
        public ?string $pipelineId = null,
        public ?string $wafStageId = null,
        public ?string $backendStageId = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['pipeline_id']) && \is_scalar($data['pipeline_id']) ? (string) $data['pipeline_id'] : null,
            isset($data['waf_stage_id']) && \is_scalar($data['waf_stage_id']) ? (string) $data['waf_stage_id'] : null,
            isset($data['backend_stage_id']) && \is_scalar($data['backend_stage_id']) ? (string) $data['backend_stage_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
