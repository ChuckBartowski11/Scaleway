<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class PrivateNetwork
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $region = null,
        public array $tags = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $subnets = [],
        public ?string $vpcId = null,
        public ?bool $dhcpEnabled = null,
        public ?bool $defaultRoutePropagationEnabled = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['subnets'] ?? null) ? $data['subnets'] : [],
            isset($data['vpc_id']) && \is_scalar($data['vpc_id']) ? (string) $data['vpc_id'] : null,
            isset($data['dhcp_enabled']) ? (bool) $data['dhcp_enabled'] : null,
            isset($data['default_route_propagation_enabled']) ? (bool) $data['default_route_propagation_enabled'] : null,
            $data,
        );
    }
}
