<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class Disk
{
    public function __construct(
        public ?int $capacity = null,
        public ?string $type = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['capacity']) && \is_numeric($data['capacity']) ? (int) $data['capacity'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            $data,
        );
    }
}
