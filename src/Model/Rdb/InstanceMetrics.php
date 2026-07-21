<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class InstanceMetrics
{
    public function __construct(
        public array $timeseries = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['timeseries'] ?? null) ? $data['timeseries'] : [],
            $data,
        );
    }
}
