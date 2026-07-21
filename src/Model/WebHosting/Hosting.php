<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class Hosting
{
    public function __construct(
        public ?string $id = null,
        public ?string $projectId = null,
        public ?string $updatedAt = null,
        public ?string $createdAt = null,
        public ?string $status = null,
        public ?string $domain = null,
        public ?array $offer = null,
        public ?array $platform = null,
        public array $tags = [],
        public ?string $dnsStatus = null,
        public ?string $ipv4 = null,
        public ?bool $protected = null,
        public ?array $user = null,
        public ?string $domainStatus = null,
        public ?string $region = null,
        public ?array $domainInfo = null,
        public ?array $commitment = null,
        public ?string $provider = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['domain']) && \is_scalar($data['domain']) ? (string) $data['domain'] : null,
            \is_array($data['offer'] ?? null) ? $data['offer'] : null,
            \is_array($data['platform'] ?? null) ? $data['platform'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['dns_status']) && \is_scalar($data['dns_status']) ? (string) $data['dns_status'] : null,
            isset($data['ipv4']) && \is_scalar($data['ipv4']) ? (string) $data['ipv4'] : null,
            isset($data['protected']) ? (bool) $data['protected'] : null,
            \is_array($data['user'] ?? null) ? $data['user'] : null,
            isset($data['domain_status']) && \is_scalar($data['domain_status']) ? (string) $data['domain_status'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['domain_info'] ?? null) ? $data['domain_info'] : null,
            \is_array($data['commitment'] ?? null) ? $data['commitment'] : null,
            isset($data['provider']) && \is_scalar($data['provider']) ? (string) $data['provider'] : null,
            $data,
        );
    }
}
