<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Domain
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $nextCheckAt = null,
        public ?string $lastValidAt = null,
        public ?string $revokedAt = null,
        public ?string $lastError = null,
        public ?string $spfConfig = null,
        public ?string $dkimConfig = null,
        public ?array $statistics = null,
        public ?array $reputation = null,
        public ?array $records = null,
        public ?bool $autoconfig = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['next_check_at']) && \is_scalar($data['next_check_at']) ? (string) $data['next_check_at'] : null,
            isset($data['last_valid_at']) && \is_scalar($data['last_valid_at']) ? (string) $data['last_valid_at'] : null,
            isset($data['revoked_at']) && \is_scalar($data['revoked_at']) ? (string) $data['revoked_at'] : null,
            isset($data['last_error']) && \is_scalar($data['last_error']) ? (string) $data['last_error'] : null,
            isset($data['spf_config']) && \is_scalar($data['spf_config']) ? (string) $data['spf_config'] : null,
            isset($data['dkim_config']) && \is_scalar($data['dkim_config']) ? (string) $data['dkim_config'] : null,
            \is_array($data['statistics'] ?? null) ? $data['statistics'] : null,
            \is_array($data['reputation'] ?? null) ? $data['reputation'] : null,
            \is_array($data['records'] ?? null) ? $data['records'] : null,
            isset($data['autoconfig']) ? (bool) $data['autoconfig'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
