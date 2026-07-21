<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\ServerlessJobs;

final readonly class JobRun
{
    public function __construct(
        public ?string $id = null,
        public ?string $jobDefinitionId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $startedAt = null,
        public ?string $terminatedAt = null,
        public ?string $runDuration = null,
        public ?string $state = null,
        public ?string $reason = null,
        public ?int $exitCode = null,
        public ?string $errorMessage = null,
        public ?int $cpuLimit = null,
        public ?int $memoryLimit = null,
        public ?int $localStorageCapacity = null,
        public ?string $command = null,
        public ?array $environmentVariables = null,
        public array $startupCommand = [],
        public array $args = [],
        public ?int $attempts = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['job_definition_id']) && \is_scalar($data['job_definition_id']) ? (string) $data['job_definition_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['started_at']) && \is_scalar($data['started_at']) ? (string) $data['started_at'] : null,
            isset($data['terminated_at']) && \is_scalar($data['terminated_at']) ? (string) $data['terminated_at'] : null,
            isset($data['run_duration']) && \is_scalar($data['run_duration']) ? (string) $data['run_duration'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            isset($data['reason']) && \is_scalar($data['reason']) ? (string) $data['reason'] : null,
            isset($data['exit_code']) && \is_numeric($data['exit_code']) ? (int) $data['exit_code'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            isset($data['cpu_limit']) && \is_numeric($data['cpu_limit']) ? (int) $data['cpu_limit'] : null,
            isset($data['memory_limit']) && \is_numeric($data['memory_limit']) ? (int) $data['memory_limit'] : null,
            isset($data['local_storage_capacity']) && \is_numeric($data['local_storage_capacity']) ? (int) $data['local_storage_capacity'] : null,
            isset($data['command']) && \is_scalar($data['command']) ? (string) $data['command'] : null,
            \is_array($data['environment_variables'] ?? null) ? $data['environment_variables'] : null,
            \is_array($data['startup_command'] ?? null) ? $data['startup_command'] : [],
            \is_array($data['args'] ?? null) ? $data['args'] : [],
            isset($data['attempts']) && \is_numeric($data['attempts']) ? (int) $data['attempts'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
