<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Functions;

final readonly class FunctionModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $namespaceId = null,
        public ?string $status = null,
        public ?array $environmentVariables = null,
        public ?int $minScale = null,
        public ?int $maxScale = null,
        public ?string $runtime = null,
        public ?int $memoryLimit = null,
        public ?int $cpuLimit = null,
        public ?string $timeout = null,
        public ?string $handler = null,
        public ?string $errorMessage = null,
        public ?string $buildMessage = null,
        public ?string $privacy = null,
        public ?string $description = null,
        public ?string $domainName = null,
        public array $secretEnvironmentVariables = [],
        public ?string $region = null,
        public ?string $httpOption = null,
        public ?string $runtimeMessage = null,
        public ?string $sandbox = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $readyAt = null,
        public array $tags = [],
        public ?string $privateNetworkId = null,
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
            isset($data['runtime']) && \is_scalar($data['runtime']) ? (string) $data['runtime'] : null,
            isset($data['memory_limit']) && \is_numeric($data['memory_limit']) ? (int) $data['memory_limit'] : null,
            isset($data['cpu_limit']) && \is_numeric($data['cpu_limit']) ? (int) $data['cpu_limit'] : null,
            isset($data['timeout']) && \is_scalar($data['timeout']) ? (string) $data['timeout'] : null,
            isset($data['handler']) && \is_scalar($data['handler']) ? (string) $data['handler'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['build_message']) && \is_scalar($data['build_message']) ? (string) $data['build_message'] : null,
            isset($data['privacy']) && \is_scalar($data['privacy']) ? (string) $data['privacy'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['domain_name']) && \is_scalar($data['domain_name']) ? (string) $data['domain_name'] : null,
            \is_array($data['secret_environment_variables'] ?? null) ? $data['secret_environment_variables'] : [],
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['http_option']) && \is_scalar($data['http_option']) ? (string) $data['http_option'] : null,
            isset($data['runtime_message']) && \is_scalar($data['runtime_message']) ? (string) $data['runtime_message'] : null,
            isset($data['sandbox']) && \is_scalar($data['sandbox']) ? (string) $data['sandbox'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['ready_at']) && \is_scalar($data['ready_at']) ? (string) $data['ready_at'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            $data,
        );
    }
}
