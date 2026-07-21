<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class Grafana
{
    public function __construct(
        public ?string $grafanaUrl = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['grafana_url']) && \is_scalar($data['grafana_url']) ? (string) $data['grafana_url'] : null,
            $data,
        );
    }
}
