<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class WebhookEvent
{
    public function __construct(
        public ?string $id = null,
        public ?string $webhookId = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $domainId = null,
        public ?string $type = null,
        public ?string $status = null,
        public ?string $data = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $emailId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['webhook_id']) && \is_scalar($data['webhook_id']) ? (string) $data['webhook_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['domain_id']) && \is_scalar($data['domain_id']) ? (string) $data['domain_id'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['data']) && \is_scalar($data['data']) ? (string) $data['data'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['email_id']) && \is_scalar($data['email_id']) ? (string) $data['email_id'] : null,
            $data,
        );
    }
}
