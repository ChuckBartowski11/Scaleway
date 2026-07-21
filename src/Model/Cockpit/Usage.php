<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class Usage
{
    public function __construct(
        public ?string $dataSourceId = null,
        public ?string $projectId = null,
        public ?string $dataSourceOrigin = null,
        public ?string $dataSourceType = null,
        public ?string $unit = null,
        public ?string $interval = null,
        public ?int $quantityOverInterval = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['data_source_id']) && \is_scalar($data['data_source_id']) ? (string) $data['data_source_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['data_source_origin']) && \is_scalar($data['data_source_origin']) ? (string) $data['data_source_origin'] : null,
            isset($data['data_source_type']) && \is_scalar($data['data_source_type']) ? (string) $data['data_source_type'] : null,
            isset($data['unit']) && \is_scalar($data['unit']) ? (string) $data['unit'] : null,
            isset($data['interval']) && \is_scalar($data['interval']) ? (string) $data['interval'] : null,
            isset($data['quantity_over_interval']) && \is_numeric($data['quantity_over_interval']) ? (int) $data['quantity_over_interval'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
