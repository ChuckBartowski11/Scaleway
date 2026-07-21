<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class GPU
{
    public function __construct(
        public ?string $name = null,
        public ?int $vram = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['vram']) && \is_numeric($data['vram']) ? (int) $data['vram'] : null,
            $data,
        );
    }
}
