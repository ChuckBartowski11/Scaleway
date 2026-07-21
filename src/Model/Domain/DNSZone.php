<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Domain;

final readonly class DNSZone
{
    public function __construct(
        public ?string $domain = null,
        public ?string $subdomain = null,
        public array $ns = [],
        public array $nsDefault = [],
        public array $nsMaster = [],
        public mixed $status = null,
        public mixed $message = null,
        public ?string $updatedAt = null,
        public ?string $projectId = null,
        public array $linkedProducts = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['domain']) && \is_scalar($data['domain']) ? (string) $data['domain'] : null,
            isset($data['subdomain']) && \is_scalar($data['subdomain']) ? (string) $data['subdomain'] : null,
            \is_array($data['ns'] ?? null) ? $data['ns'] : [],
            \is_array($data['ns_default'] ?? null) ? $data['ns_default'] : [],
            \is_array($data['ns_master'] ?? null) ? $data['ns_master'] : [],
            $data['status'] ?? null,
            $data['message'] ?? null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            \is_array($data['linked_products'] ?? null) ? $data['linked_products'] : [],
            $data,
        );
    }
}
