<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BlockStorage;

final readonly class VolumeType
{
    public function __construct(
        public ?string $type = null,
        public ?array $pricing = null,
        public ?array $snapshotPricing = null,
        public ?array $specs = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            \is_array($data['pricing'] ?? null) ? $data['pricing'] : null,
            \is_array($data['snapshot_pricing'] ?? null) ? $data['snapshot_pricing'] : null,
            \is_array($data['specs'] ?? null) ? $data['specs'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
