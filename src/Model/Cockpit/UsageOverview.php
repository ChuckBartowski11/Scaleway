<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class UsageOverview
{
    public function __construct(
        public mixed $scalewayMetricsUsage = null,
        public mixed $scalewayLogsUsage = null,
        public mixed $externalMetricsUsage = null,
        public mixed $externalLogsUsage = null,
        public mixed $externalTracesUsage = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            $data['scaleway_metrics_usage'] ?? null,
            $data['scaleway_logs_usage'] ?? null,
            $data['external_metrics_usage'] ?? null,
            $data['external_logs_usage'] ?? null,
            $data['external_traces_usage'] ?? null,
            $data,
        );
    }
}
