<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Functions;

final readonly class NamespaceModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?array $environmentVariables = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $status = null,
        public ?string $registryNamespaceId = null,
        public ?string $errorMessage = null,
        public ?string $registryEndpoint = null,
        public ?string $description = null,
        public array $secretEnvironmentVariables = [],
        public ?string $region = null,
        public array $tags = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $vpcIntegrationActivated = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['environment_variables'] ?? null) ? $data['environment_variables'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['registry_namespace_id']) && \is_scalar($data['registry_namespace_id']) ? (string) $data['registry_namespace_id'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['registry_endpoint']) && \is_scalar($data['registry_endpoint']) ? (string) $data['registry_endpoint'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['secret_environment_variables'] ?? null) ? $data['secret_environment_variables'] : [],
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['vpc_integration_activated']) ? (bool) $data['vpc_integration_activated'] : null,
            $data,
        );
    }
}
