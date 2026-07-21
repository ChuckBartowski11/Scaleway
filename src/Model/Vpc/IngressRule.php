<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class IngressRule
{
    public function __construct(
        public ?string $id = null,
        public ?string $vpcId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $isIpv6 = null,
        public ?string $source = null,
        public ?string $nexthopResourceIp = null,
        public ?string $nexthopPrivateNetworkId = null,
        public ?string $description = null,
        public array $tags = [],
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['vpc_id']) && \is_scalar($data['vpc_id']) ? (string) $data['vpc_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['is_ipv6']) ? (bool) $data['is_ipv6'] : null,
            isset($data['source']) && \is_scalar($data['source']) ? (string) $data['source'] : null,
            isset($data['nexthop_resource_ip']) && \is_scalar($data['nexthop_resource_ip']) ? (string) $data['nexthop_resource_ip'] : null,
            isset($data['nexthop_private_network_id']) && \is_scalar($data['nexthop_private_network_id']) ? (string) $data['nexthop_private_network_id'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
