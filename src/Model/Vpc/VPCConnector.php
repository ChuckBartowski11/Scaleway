<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class VPCConnector
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $vpcId = null,
        public ?string $targetVpcId = null,
        public ?string $status = null,
        public ?array $peerInfo = null,
        public ?string $region = null,
        public array $tags = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
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
            isset($data['vpc_id']) && \is_scalar($data['vpc_id']) ? (string) $data['vpc_id'] : null,
            isset($data['target_vpc_id']) && \is_scalar($data['target_vpc_id']) ? (string) $data['target_vpc_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['peer_info'] ?? null) ? $data['peer_info'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
