<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\VpcGw;

final readonly class GatewayNetwork
{
    public function __construct(
        public ?string $id = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $gatewayId = null,
        public ?string $privateNetworkId = null,
        public ?string $macAddress = null,
        public ?bool $masqueradeEnabled = null,
        public ?string $status = null,
        public ?bool $pushDefaultRoute = null,
        public ?string $ipamIpId = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['gateway_id']) && \is_scalar($data['gateway_id']) ? (string) $data['gateway_id'] : null,
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            isset($data['mac_address']) && \is_scalar($data['mac_address']) ? (string) $data['mac_address'] : null,
            isset($data['masquerade_enabled']) ? (bool) $data['masquerade_enabled'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['push_default_route']) ? (bool) $data['push_default_route'] : null,
            isset($data['ipam_ip_id']) && \is_scalar($data['ipam_ip_id']) ? (string) $data['ipam_ip_id'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
