<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class LbType
{
    public function __construct(
        public ?string $name = null,
        public ?string $stockStatus = null,
        public ?int $bandwidth = null,
        public ?bool $multicloud = null,
        public ?string $description = null,
        public ?string $region = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['stock_status']) && \is_scalar($data['stock_status']) ? (string) $data['stock_status'] : null,
            isset($data['bandwidth']) && \is_numeric($data['bandwidth']) ? (int) $data['bandwidth'] : null,
            isset($data['multicloud']) ? (bool) $data['multicloud'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
