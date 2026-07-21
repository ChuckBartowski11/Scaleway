<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class Server
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $updatedAt = null,
        public ?string $createdAt = null,
        public ?string $status = null,
        public ?string $offerId = null,
        public ?string $offerName = null,
        public array $tags = [],
        public array $ips = [],
        public ?string $domain = null,
        public ?string $bootType = null,
        public ?string $zone = null,
        public ?array $install = null,
        public ?string $pingStatus = null,
        public array $options = [],
        public ?array $rescueServer = null,
        public ?bool $protected = null,
        public ?array $userData = null,
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
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['offer_id']) && \is_scalar($data['offer_id']) ? (string) $data['offer_id'] : null,
            isset($data['offer_name']) && \is_scalar($data['offer_name']) ? (string) $data['offer_name'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['ips'] ?? null) ? $data['ips'] : [],
            isset($data['domain']) && \is_scalar($data['domain']) ? (string) $data['domain'] : null,
            isset($data['boot_type']) && \is_scalar($data['boot_type']) ? (string) $data['boot_type'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            \is_array($data['install'] ?? null) ? $data['install'] : null,
            isset($data['ping_status']) && \is_scalar($data['ping_status']) ? (string) $data['ping_status'] : null,
            \is_array($data['options'] ?? null) ? $data['options'] : [],
            \is_array($data['rescue_server'] ?? null) ? $data['rescue_server'] : null,
            isset($data['protected']) ? (bool) $data['protected'] : null,
            \is_array($data['user_data'] ?? null) ? $data['user_data'] : null,
            $data,
        );
    }
}
