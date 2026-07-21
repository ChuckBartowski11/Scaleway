<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class ControlPanel
{
    public function __construct(
        public ?string $name = null,
        public ?bool $available = null,
        public ?string $logoUrl = null,
        public array $availableLanguages = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['available']) ? (bool) $data['available'] : null,
            isset($data['logo_url']) && \is_scalar($data['logo_url']) ? (string) $data['logo_url'] : null,
            \is_array($data['available_languages'] ?? null) ? $data['available_languages'] : [],
            $data,
        );
    }
}
