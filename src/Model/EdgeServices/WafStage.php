<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class WafStage
{
    public function __construct(
        public ?string $id = null,
        public ?string $pipelineId = null,
        public ?string $mode = null,
        public ?int $paranoiaLevel = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $backendStageId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['pipeline_id']) && \is_scalar($data['pipeline_id']) ? (string) $data['pipeline_id'] : null,
            isset($data['mode']) && \is_scalar($data['mode']) ? (string) $data['mode'] : null,
            isset($data['paranoia_level']) && \is_numeric($data['paranoia_level']) ? (int) $data['paranoia_level'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['backend_stage_id']) && \is_scalar($data['backend_stage_id']) ? (string) $data['backend_stage_id'] : null,
            $data,
        );
    }
}
