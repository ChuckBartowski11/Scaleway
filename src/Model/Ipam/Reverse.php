<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Ipam;

final readonly class Reverse
{
    public function __construct(
        public ?string $hostname = null,
        public ?string $address = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['hostname']) && \is_scalar($data['hostname']) ? (string) $data['hostname'] : null,
            isset($data['address']) && \is_scalar($data['address']) ? (string) $data['address'] : null,
            $data,
        );
    }
}
