<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Domain;

final readonly class SSLCertificate
{
    public function __construct(
        public ?string $dnsZone = null,
        public array $alternativeDnsZones = [],
        public mixed $status = null,
        public ?string $privateKey = null,
        public ?string $certificateChain = null,
        public ?string $createdAt = null,
        public ?string $expiredAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['dns_zone']) && \is_scalar($data['dns_zone']) ? (string) $data['dns_zone'] : null,
            \is_array($data['alternative_dns_zones'] ?? null) ? $data['alternative_dns_zones'] : [],
            $data['status'] ?? null,
            isset($data['private_key']) && \is_scalar($data['private_key']) ? (string) $data['private_key'] : null,
            isset($data['certificate_chain']) && \is_scalar($data['certificate_chain']) ? (string) $data['certificate_chain'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['expired_at']) && \is_scalar($data['expired_at']) ? (string) $data['expired_at'] : null,
            $data,
        );
    }
}
