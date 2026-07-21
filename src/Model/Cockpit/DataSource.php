<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class DataSource
{
    public function __construct(
        public ?string $id = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public ?string $url = null,
        public ?string $type = null,
        public ?string $origin = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $synchronizedWithGrafana = null,
        public ?int $retentionDays = null,
        public ?string $region = null,
        public ?int $currentMonthUsage = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['origin']) && \is_scalar($data['origin']) ? (string) $data['origin'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['synchronized_with_grafana']) ? (bool) $data['synchronized_with_grafana'] : null,
            isset($data['retention_days']) && \is_numeric($data['retention_days']) ? (int) $data['retention_days'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['current_month_usage']) && \is_numeric($data['current_month_usage']) ? (int) $data['current_month_usage'] : null,
            $data,
        );
    }
}
