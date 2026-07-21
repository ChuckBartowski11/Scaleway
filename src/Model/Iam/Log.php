<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Log
{
    public function __construct(
        public ?string $id = null,
        public ?string $createdAt = null,
        public ?string $ip = null,
        public ?string $userAgent = null,
        public ?string $action = null,
        public ?string $bearerId = null,
        public ?string $organizationId = null,
        public ?string $resourceType = null,
        public ?string $resourceId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            isset($data['user_agent']) && \is_scalar($data['user_agent']) ? (string) $data['user_agent'] : null,
            isset($data['action']) && \is_scalar($data['action']) ? (string) $data['action'] : null,
            isset($data['bearer_id']) && \is_scalar($data['bearer_id']) ? (string) $data['bearer_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['resource_type']) && \is_scalar($data['resource_type']) ? (string) $data['resource_type'] : null,
            isset($data['resource_id']) && \is_scalar($data['resource_id']) ? (string) $data['resource_id'] : null,
            $data,
        );
    }
}
