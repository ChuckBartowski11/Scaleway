<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Ipam;

final readonly class IP
{
    public function __construct(
        public ?string $id = null,
        public ?string $address = null,
        public ?string $projectId = null,
        public ?bool $isIpv6 = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?array $source = null,
        public ?array $resource = null,
        public array $tags = [],
        public array $reverses = [],
        public ?string $region = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['address']) && \is_scalar($data['address']) ? (string) $data['address'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['is_ipv6']) ? (bool) $data['is_ipv6'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['source'] ?? null) ? $data['source'] : null,
            \is_array($data['resource'] ?? null) ? $data['resource'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['reverses'] ?? null) ? $data['reverses'] : [],
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
