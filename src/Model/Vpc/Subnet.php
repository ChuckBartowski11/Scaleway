<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class Subnet
{
    public function __construct(
        public ?string $id = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $subnet = null,
        public ?string $projectId = null,
        public ?string $privateNetworkId = null,
        public ?string $vpcId = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['subnet']) && \is_scalar($data['subnet']) ? (string) $data['subnet'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            isset($data['vpc_id']) && \is_scalar($data['vpc_id']) ? (string) $data['vpc_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
