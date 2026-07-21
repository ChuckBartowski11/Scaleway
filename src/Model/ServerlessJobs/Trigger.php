<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\ServerlessJobs;

final readonly class Trigger
{
    public function __construct(
        public ?string $id = null,
        public ?string $jobDefinitionId = null,
        public ?string $name = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?array $cronConfig = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['job_definition_id']) && \is_scalar($data['job_definition_id']) ? (string) $data['job_definition_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['cron_config'] ?? null) ? $data['cron_config'] : null,
            $data,
        );
    }
}
