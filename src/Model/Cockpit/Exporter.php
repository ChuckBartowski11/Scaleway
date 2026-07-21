<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class Exporter
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $datasourceId = null,
        public ?array $datadogDestination = null,
        public ?array $otlpDestination = null,
        public ?string $status = null,
        public array $exportedProducts = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['datasource_id']) && \is_scalar($data['datasource_id']) ? (string) $data['datasource_id'] : null,
            \is_array($data['datadog_destination'] ?? null) ? $data['datadog_destination'] : null,
            \is_array($data['otlp_destination'] ?? null) ? $data['otlp_destination'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['exported_products'] ?? null) ? $data['exported_products'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
