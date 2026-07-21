<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\FlexibleIp;

final readonly class FlexibleIP
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $description = null,
        public array $tags = [],
        public ?string $updatedAt = null,
        public ?string $createdAt = null,
        public ?string $status = null,
        public ?string $ipAddress = null,
        public ?array $macAddress = null,
        public ?string $serverId = null,
        public ?string $reverse = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['ip_address']) && \is_scalar($data['ip_address']) ? (string) $data['ip_address'] : null,
            \is_array($data['mac_address'] ?? null) ? $data['mac_address'] : null,
            isset($data['server_id']) && \is_scalar($data['server_id']) ? (string) $data['server_id'] : null,
            isset($data['reverse']) && \is_scalar($data['reverse']) ? (string) $data['reverse'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
