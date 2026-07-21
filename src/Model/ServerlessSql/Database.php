<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\ServerlessSql;

final readonly class Database
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $endpoint = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $region = null,
        public ?string $createdAt = null,
        public ?int $cpuMin = null,
        public ?int $cpuMax = null,
        public ?int $cpuCurrent = null,
        public ?bool $started = null,
        public ?int $engineMajorVersion = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['endpoint']) && \is_scalar($data['endpoint']) ? (string) $data['endpoint'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['cpu_min']) && \is_numeric($data['cpu_min']) ? (int) $data['cpu_min'] : null,
            isset($data['cpu_max']) && \is_numeric($data['cpu_max']) ? (int) $data['cpu_max'] : null,
            isset($data['cpu_current']) && \is_numeric($data['cpu_current']) ? (int) $data['cpu_current'] : null,
            isset($data['started']) ? (bool) $data['started'] : null,
            isset($data['engine_major_version']) && \is_numeric($data['engine_major_version']) ? (int) $data['engine_major_version'] : null,
            $data,
        );
    }
}
