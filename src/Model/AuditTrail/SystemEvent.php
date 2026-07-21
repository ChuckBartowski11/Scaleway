<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class SystemEvent
{
    public function __construct(
        public ?string $id = null,
        public ?string $recordedAt = null,
        public ?string $locality = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $productName = null,
        public ?string $source = null,
        public ?string $systemName = null,
        public array $resources = [],
        public ?string $kind = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['recorded_at']) && \is_scalar($data['recorded_at']) ? (string) $data['recorded_at'] : null,
            isset($data['locality']) && \is_scalar($data['locality']) ? (string) $data['locality'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['product_name']) && \is_scalar($data['product_name']) ? (string) $data['product_name'] : null,
            isset($data['source']) && \is_scalar($data['source']) ? (string) $data['source'] : null,
            isset($data['system_name']) && \is_scalar($data['system_name']) ? (string) $data['system_name'] : null,
            \is_array($data['resources'] ?? null) ? $data['resources'] : [],
            isset($data['kind']) && \is_scalar($data['kind']) ? (string) $data['kind'] : null,
            $data,
        );
    }
}
