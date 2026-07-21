<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class BackupItemGroup
{
    public function __construct(
        public ?string $type = null,
        public array $items = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            \is_array($data['items'] ?? null) ? $data['items'] : [],
            $data,
        );
    }
}
