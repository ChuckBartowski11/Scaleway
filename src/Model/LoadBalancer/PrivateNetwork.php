<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class PrivateNetwork
{
    public function __construct(
        public ?array $lb = null,
        public array $ipamIds = [],
        public ?array $staticConfig = null,
        public ?array $dhcpConfig = null,
        public ?string $privateNetworkId = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['lb'] ?? null) ? $data['lb'] : null,
            \is_array($data['ipam_ids'] ?? null) ? $data['ipam_ids'] : [],
            \is_array($data['static_config'] ?? null) ? $data['static_config'] : null,
            \is_array($data['dhcp_config'] ?? null) ? $data['dhcp_config'] : null,
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
