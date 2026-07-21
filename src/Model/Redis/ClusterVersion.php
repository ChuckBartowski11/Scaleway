<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class ClusterVersion
{
    public function __construct(
        public ?string $version = null,
        public ?string $endOfLifeAt = null,
        public array $availableSettings = [],
        public ?string $logoUrl = null,
        public ?string $releasedAt = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['end_of_life_at']) && \is_scalar($data['end_of_life_at']) ? (string) $data['end_of_life_at'] : null,
            \is_array($data['available_settings'] ?? null) ? $data['available_settings'] : [],
            isset($data['logo_url']) && \is_scalar($data['logo_url']) ? (string) $data['logo_url'] : null,
            isset($data['released_at']) && \is_scalar($data['released_at']) ? (string) $data['released_at'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
