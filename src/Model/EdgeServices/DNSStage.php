<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class DNSStage
{
    public function __construct(
        public ?string $id = null,
        public ?string $defaultFqdn = null,
        public array $fqdns = [],
        public ?string $type = null,
        public ?string $pipelineId = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $tlsStageId = null,
        public ?string $cacheStageId = null,
        public ?string $backendStageId = null,
        public ?bool $wildcardDomain = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['default_fqdn']) && \is_scalar($data['default_fqdn']) ? (string) $data['default_fqdn'] : null,
            \is_array($data['fqdns'] ?? null) ? $data['fqdns'] : [],
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['pipeline_id']) && \is_scalar($data['pipeline_id']) ? (string) $data['pipeline_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['tls_stage_id']) && \is_scalar($data['tls_stage_id']) ? (string) $data['tls_stage_id'] : null,
            isset($data['cache_stage_id']) && \is_scalar($data['cache_stage_id']) ? (string) $data['cache_stage_id'] : null,
            isset($data['backend_stage_id']) && \is_scalar($data['backend_stage_id']) ? (string) $data['backend_stage_id'] : null,
            isset($data['wildcard_domain']) ? (bool) $data['wildcard_domain'] : null,
            $data,
        );
    }
}
