<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class PrivateNIC
{
    public function __construct(
        public ?string $id = null,
        public ?string $serverId = null,
        public ?string $privateNetworkId = null,
        public ?string $macAddress = null,
        public ?string $state = null,
        public array $tags = [],
        public ?string $creationDate = null,
        public ?string $zone = null,
        public array $ipamIpIds = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['server_id']) && \is_scalar($data['server_id']) ? (string) $data['server_id'] : null,
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            isset($data['mac_address']) && \is_scalar($data['mac_address']) ? (string) $data['mac_address'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            \is_array($data['ipam_ip_ids'] ?? null) ? $data['ipam_ip_ids'] : [],
            $data,
        );
    }
}
