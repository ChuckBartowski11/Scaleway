<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class EngineVersion
{
    public function __construct(
        public ?string $version = null,
        public ?string $name = null,
        public ?string $endOfLife = null,
        public array $availableSettings = [],
        public ?bool $disabled = null,
        public ?bool $beta = null,
        public array $availableInitSettings = [],
        public ?string $releaseDate = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['end_of_life']) && \is_scalar($data['end_of_life']) ? (string) $data['end_of_life'] : null,
            \is_array($data['available_settings'] ?? null) ? $data['available_settings'] : [],
            isset($data['disabled']) ? (bool) $data['disabled'] : null,
            isset($data['beta']) ? (bool) $data['beta'] : null,
            \is_array($data['available_init_settings'] ?? null) ? $data['available_init_settings'] : [],
            isset($data['release_date']) && \is_scalar($data['release_date']) ? (string) $data['release_date'] : null,
            $data,
        );
    }
}
