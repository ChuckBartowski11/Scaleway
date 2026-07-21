<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class Product
{
    public function __construct(
        public ?string $name = null,
        public ?string $displayName = null,
        public ?string $familyName = null,
        public array $resourceTypes = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['display_name']) && \is_scalar($data['display_name']) ? (string) $data['display_name'] : null,
            isset($data['family_name']) && \is_scalar($data['family_name']) ? (string) $data['family_name'] : null,
            \is_array($data['resource_types'] ?? null) ? $data['resource_types'] : [],
            $data,
        );
    }
}
