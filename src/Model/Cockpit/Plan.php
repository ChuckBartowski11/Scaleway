<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class Plan
{
    public function __construct(
        public ?string $name = null,
        public ?string $retentionMetricsInterval = null,
        public ?string $retentionLogsInterval = null,
        public ?string $retentionTracesInterval = null,
        public ?int $sampleIngestionPrice = null,
        public ?int $logsIngestionPrice = null,
        public ?int $tracesIngestionPrice = null,
        public ?int $monthlyPrice = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['retention_metrics_interval']) && \is_scalar($data['retention_metrics_interval']) ? (string) $data['retention_metrics_interval'] : null,
            isset($data['retention_logs_interval']) && \is_scalar($data['retention_logs_interval']) ? (string) $data['retention_logs_interval'] : null,
            isset($data['retention_traces_interval']) && \is_scalar($data['retention_traces_interval']) ? (string) $data['retention_traces_interval'] : null,
            isset($data['sample_ingestion_price']) && \is_numeric($data['sample_ingestion_price']) ? (int) $data['sample_ingestion_price'] : null,
            isset($data['logs_ingestion_price']) && \is_numeric($data['logs_ingestion_price']) ? (int) $data['logs_ingestion_price'] : null,
            isset($data['traces_ingestion_price']) && \is_numeric($data['traces_ingestion_price']) ? (int) $data['traces_ingestion_price'] : null,
            isset($data['monthly_price']) && \is_numeric($data['monthly_price']) ? (int) $data['monthly_price'] : null,
            $data,
        );
    }
}
