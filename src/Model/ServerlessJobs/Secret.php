<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\ServerlessJobs;

final readonly class Secret
{
    public function __construct(
        public ?string $secretId = null,
        public ?string $secretManagerId = null,
        public ?string $secretManagerVersion = null,
        public ?string $jobDefinitionId = null,
        public ?array $file = null,
        public ?array $envVar = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['secret_id']) && \is_scalar($data['secret_id']) ? (string) $data['secret_id'] : null,
            isset($data['secret_manager_id']) && \is_scalar($data['secret_manager_id']) ? (string) $data['secret_manager_id'] : null,
            isset($data['secret_manager_version']) && \is_scalar($data['secret_manager_version']) ? (string) $data['secret_manager_version'] : null,
            isset($data['job_definition_id']) && \is_scalar($data['job_definition_id']) ? (string) $data['job_definition_id'] : null,
            \is_array($data['file'] ?? null) ? $data['file'] : null,
            \is_array($data['env_var'] ?? null) ? $data['env_var'] : null,
            $data,
        );
    }
}
