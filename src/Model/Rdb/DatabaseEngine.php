<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class DatabaseEngine
{
    public function __construct(
        public ?string $name = null,
        public ?string $logoUrl = null,
        public array $versions = [],
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['logo_url']) && \is_scalar($data['logo_url']) ? (string) $data['logo_url'] : null,
            \is_array($data['versions'] ?? null) ? $data['versions'] : [],
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
