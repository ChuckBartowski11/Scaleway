<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class ACLRule
{
    public function __construct(
        public ?string $id = null,
        public ?string $ip = null,
        public ?bool $scalewayRanges = null,
        public ?string $description = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            isset($data['scaleway_ranges']) ? (bool) $data['scaleway_ranges'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
