<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class HostingSummary
{
    public function __construct(
        public ?string $id = null,
        public ?string $projectId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $status = null,
        public ?string $domain = null,
        public ?bool $protected = null,
        public ?string $dnsStatus = null,
        public ?string $offerName = null,
        public ?string $domainStatus = null,
        public ?string $region = null,
        public ?array $domainInfo = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['domain']) && \is_scalar($data['domain']) ? (string) $data['domain'] : null,
            isset($data['protected']) ? (bool) $data['protected'] : null,
            isset($data['dns_status']) && \is_scalar($data['dns_status']) ? (string) $data['dns_status'] : null,
            isset($data['offer_name']) && \is_scalar($data['offer_name']) ? (string) $data['offer_name'] : null,
            isset($data['domain_status']) && \is_scalar($data['domain_status']) ? (string) $data['domain_status'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['domain_info'] ?? null) ? $data['domain_info'] : null,
            $data,
        );
    }
}
