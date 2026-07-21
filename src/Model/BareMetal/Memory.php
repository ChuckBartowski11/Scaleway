<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class Memory
{
    public function __construct(
        public ?int $capacity = null,
        public ?string $type = null,
        public ?int $frequency = null,
        public ?bool $isEcc = null,
        public ?string $eccType = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['capacity']) && \is_numeric($data['capacity']) ? (int) $data['capacity'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['frequency']) && \is_numeric($data['frequency']) ? (int) $data['frequency'] : null,
            isset($data['is_ecc']) ? (bool) $data['is_ecc'] : null,
            isset($data['ecc_type']) && \is_scalar($data['ecc_type']) ? (string) $data['ecc_type'] : null,
            $data,
        );
    }
}
