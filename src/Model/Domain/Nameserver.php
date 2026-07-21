<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Domain;

final readonly class Nameserver
{
    public function __construct(
        public ?string $name = null,
        public array $ip = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['ip'] ?? null) ? $data['ip'] : [],
            $data,
        );
    }
}
