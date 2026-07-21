<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class Product
{
    public function __construct(
        public ?string $title = null,
        public ?string $name = null,
        public array $services = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['title']) && \is_scalar($data['title']) ? (string) $data['title'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['services'] ?? null) ? $data['services'] : [],
            $data,
        );
    }
}
