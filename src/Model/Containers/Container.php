<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Containers;

final readonly class Container
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $namespaceId = null,
        public ?string $status = null,
        public ?array $environmentVariables = null,
        public ?int $minScale = null,
        public ?int $maxScale = null,
        public ?int $memoryLimit = null,
        public ?int $cpuLimit = null,
        public ?string $timeout = null,
        public ?string $errorMessage = null,
        public ?string $privacy = null,
        public ?string $description = null,
        public ?string $registryImage = null,
        public ?int $maxConcurrency = null,
        public ?string $domainName = null,
        public ?string $protocol = null,
        public ?int $port = null,
        public array $secretEnvironmentVariables = [],
        public ?string $httpOption = null,
        public ?string $sandbox = null,
        public ?int $localStorageLimit = null,
        public ?array $scalingOption = null,
        public ?array $healthCheck = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $readyAt = null,
        public ?string $region = null,
        public array $tags = [],
        public ?string $privateNetworkId = null,
        public array $command = [],
        public array $args = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['namespace_id']) && \is_scalar($data['namespace_id']) ? (string) $data['namespace_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['environment_variables'] ?? null) ? $data['environment_variables'] : null,
            isset($data['min_scale']) && \is_numeric($data['min_scale']) ? (int) $data['min_scale'] : null,
            isset($data['max_scale']) && \is_numeric($data['max_scale']) ? (int) $data['max_scale'] : null,
            isset($data['memory_limit']) && \is_numeric($data['memory_limit']) ? (int) $data['memory_limit'] : null,
            isset($data['cpu_limit']) && \is_numeric($data['cpu_limit']) ? (int) $data['cpu_limit'] : null,
            isset($data['timeout']) && \is_scalar($data['timeout']) ? (string) $data['timeout'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['privacy']) && \is_scalar($data['privacy']) ? (string) $data['privacy'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['registry_image']) && \is_scalar($data['registry_image']) ? (string) $data['registry_image'] : null,
            isset($data['max_concurrency']) && \is_numeric($data['max_concurrency']) ? (int) $data['max_concurrency'] : null,
            isset($data['domain_name']) && \is_scalar($data['domain_name']) ? (string) $data['domain_name'] : null,
            isset($data['protocol']) && \is_scalar($data['protocol']) ? (string) $data['protocol'] : null,
            isset($data['port']) && \is_numeric($data['port']) ? (int) $data['port'] : null,
            \is_array($data['secret_environment_variables'] ?? null) ? $data['secret_environment_variables'] : [],
            isset($data['http_option']) && \is_scalar($data['http_option']) ? (string) $data['http_option'] : null,
            isset($data['sandbox']) && \is_scalar($data['sandbox']) ? (string) $data['sandbox'] : null,
            isset($data['local_storage_limit']) && \is_numeric($data['local_storage_limit']) ? (int) $data['local_storage_limit'] : null,
            \is_array($data['scaling_option'] ?? null) ? $data['scaling_option'] : null,
            \is_array($data['health_check'] ?? null) ? $data['health_check'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['ready_at']) && \is_scalar($data['ready_at']) ? (string) $data['ready_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            \is_array($data['command'] ?? null) ? $data['command'] : [],
            \is_array($data['args'] ?? null) ? $data['args'] : [],
            $data,
        );
    }
}
