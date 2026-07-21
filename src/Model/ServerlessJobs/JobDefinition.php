<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\ServerlessJobs;

final readonly class JobDefinition
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?int $cpuLimit = null,
        public ?int $memoryLimit = null,
        public ?int $localStorageCapacity = null,
        public ?string $imageUri = null,
        public ?string $command = null,
        public ?array $environmentVariables = null,
        public ?string $jobTimeout = null,
        public ?string $description = null,
        public ?array $cronSchedule = null,
        public array $startupCommand = [],
        public array $args = [],
        public ?array $retryPolicy = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['cpu_limit']) && \is_numeric($data['cpu_limit']) ? (int) $data['cpu_limit'] : null,
            isset($data['memory_limit']) && \is_numeric($data['memory_limit']) ? (int) $data['memory_limit'] : null,
            isset($data['local_storage_capacity']) && \is_numeric($data['local_storage_capacity']) ? (int) $data['local_storage_capacity'] : null,
            isset($data['image_uri']) && \is_scalar($data['image_uri']) ? (string) $data['image_uri'] : null,
            isset($data['command']) && \is_scalar($data['command']) ? (string) $data['command'] : null,
            \is_array($data['environment_variables'] ?? null) ? $data['environment_variables'] : null,
            isset($data['job_timeout']) && \is_scalar($data['job_timeout']) ? (string) $data['job_timeout'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['cron_schedule'] ?? null) ? $data['cron_schedule'] : null,
            \is_array($data['startup_command'] ?? null) ? $data['startup_command'] : [],
            \is_array($data['args'] ?? null) ? $data['args'] : [],
            \is_array($data['retry_policy'] ?? null) ? $data['retry_policy'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
