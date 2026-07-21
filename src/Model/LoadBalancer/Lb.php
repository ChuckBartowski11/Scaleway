<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Lb
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $status = null,
        public array $instances = [],
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public array $ip = [],
        public array $tags = [],
        public ?int $frontendCount = null,
        public ?int $backendCount = null,
        public ?string $type = null,
        public ?array $subscriber = null,
        public ?string $sslCompatibilityLevel = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?int $privateNetworkCount = null,
        public ?int $routeCount = null,
        public ?string $region = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['instances'] ?? null) ? $data['instances'] : [],
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            \is_array($data['ip'] ?? null) ? $data['ip'] : [],
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['frontend_count']) && \is_numeric($data['frontend_count']) ? (int) $data['frontend_count'] : null,
            isset($data['backend_count']) && \is_numeric($data['backend_count']) ? (int) $data['backend_count'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            \is_array($data['subscriber'] ?? null) ? $data['subscriber'] : null,
            isset($data['ssl_compatibility_level']) && \is_scalar($data['ssl_compatibility_level']) ? (string) $data['ssl_compatibility_level'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['private_network_count']) && \is_numeric($data['private_network_count']) ? (int) $data['private_network_count'] : null,
            isset($data['route_count']) && \is_numeric($data['route_count']) ? (int) $data['route_count'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
