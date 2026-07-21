<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class Route
{
    public function __construct(
        public ?string $id = null,
        public ?string $description = null,
        public array $tags = [],
        public ?string $vpcId = null,
        public ?string $destination = null,
        public ?string $nexthopResourceId = null,
        public ?string $nexthopPrivateNetworkId = null,
        public ?string $nexthopVpcConnectorId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $isReadOnly = null,
        public ?string $type = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['vpc_id']) && \is_scalar($data['vpc_id']) ? (string) $data['vpc_id'] : null,
            isset($data['destination']) && \is_scalar($data['destination']) ? (string) $data['destination'] : null,
            isset($data['nexthop_resource_id']) && \is_scalar($data['nexthop_resource_id']) ? (string) $data['nexthop_resource_id'] : null,
            isset($data['nexthop_private_network_id']) && \is_scalar($data['nexthop_private_network_id']) ? (string) $data['nexthop_private_network_id'] : null,
            isset($data['nexthop_vpc_connector_id']) && \is_scalar($data['nexthop_vpc_connector_id']) ? (string) $data['nexthop_vpc_connector_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['is_read_only']) ? (bool) $data['is_read_only'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
