<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Webhook
{
    public function __construct(
        public ?string $id = null,
        public ?string $domainId = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public array $eventTypes = [],
        public ?string $snsArn = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['domain_id']) && \is_scalar($data['domain_id']) ? (string) $data['domain_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['event_types'] ?? null) ? $data['event_types'] : [],
            isset($data['sns_arn']) && \is_scalar($data['sns_arn']) ? (string) $data['sns_arn'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
