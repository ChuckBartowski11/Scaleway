<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class CPU
{
    public function __construct(
        public ?string $name = null,
        public ?int $coreCount = null,
        public ?int $threadCount = null,
        public ?int $frequency = null,
        public ?string $benchmark = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['core_count']) && \is_numeric($data['core_count']) ? (int) $data['core_count'] : null,
            isset($data['thread_count']) && \is_numeric($data['thread_count']) ? (int) $data['thread_count'] : null,
            isset($data['frequency']) && \is_numeric($data['frequency']) ? (int) $data['frequency'] : null,
            isset($data['benchmark']) && \is_scalar($data['benchmark']) ? (string) $data['benchmark'] : null,
            $data,
        );
    }
}
