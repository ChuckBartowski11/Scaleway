<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class TLSStage
{
    public function __construct(
        public ?string $id = null,
        public array $secrets = [],
        public ?bool $managedCertificate = null,
        public ?string $pipelineId = null,
        public ?string $certificateExpiresAt = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $cacheStageId = null,
        public ?string $backendStageId = null,
        public ?string $wafStageId = null,
        public ?string $routeStageId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            \is_array($data['secrets'] ?? null) ? $data['secrets'] : [],
            isset($data['managed_certificate']) ? (bool) $data['managed_certificate'] : null,
            isset($data['pipeline_id']) && \is_scalar($data['pipeline_id']) ? (string) $data['pipeline_id'] : null,
            isset($data['certificate_expires_at']) && \is_scalar($data['certificate_expires_at']) ? (string) $data['certificate_expires_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['cache_stage_id']) && \is_scalar($data['cache_stage_id']) ? (string) $data['cache_stage_id'] : null,
            isset($data['backend_stage_id']) && \is_scalar($data['backend_stage_id']) ? (string) $data['backend_stage_id'] : null,
            isset($data['waf_stage_id']) && \is_scalar($data['waf_stage_id']) ? (string) $data['waf_stage_id'] : null,
            isset($data['route_stage_id']) && \is_scalar($data['route_stage_id']) ? (string) $data['route_stage_id'] : null,
            $data,
        );
    }
}
