<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\VpcGw;

final readonly class GatewayType
{
    public function __construct(
        public ?string $name = null,
        public ?int $bandwidth = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['bandwidth']) && \is_numeric($data['bandwidth']) ? (int) $data['bandwidth'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
