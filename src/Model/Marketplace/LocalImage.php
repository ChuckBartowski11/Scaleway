<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Marketplace;

final readonly class LocalImage
{
    public function __construct(
        public ?string $id = null,
        public array $compatibleCommercialTypes = [],
        public ?string $arch = null,
        public ?string $zone = null,
        public ?string $label = null,
        public ?string $type = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            \is_array($data['compatible_commercial_types'] ?? null) ? $data['compatible_commercial_types'] : [],
            isset($data['arch']) && \is_scalar($data['arch']) ? (string) $data['arch'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['label']) && \is_scalar($data['label']) ? (string) $data['label'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            $data,
        );
    }
}
