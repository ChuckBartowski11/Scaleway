<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class VPC
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $region = null,
        public array $tags = [],
        public ?bool $isDefault = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?int $privateNetworkCount = null,
        public ?bool $routingEnabled = null,
        public ?bool $customRoutesPropagationEnabled = null,
        public ?bool $transitivityEnabled = null,
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
            isset($data['is_default']) ? (bool) $data['is_default'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['private_network_count']) && \is_numeric($data['private_network_count']) ? (int) $data['private_network_count'] : null,
            isset($data['routing_enabled']) ? (bool) $data['routing_enabled'] : null,
            isset($data['custom_routes_propagation_enabled']) ? (bool) $data['custom_routes_propagation_enabled'] : null,
            isset($data['transitivity_enabled']) ? (bool) $data['transitivity_enabled'] : null,
            $data,
        );
    }
}
