<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Domain;

final readonly class RecordChange
{
    public function __construct(
        public ?array $add = null,
        public ?array $set = null,
        public ?array $delete = null,
        public ?array $clear = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['add'] ?? null) ? $data['add'] : null,
            \is_array($data['set'] ?? null) ? $data['set'] : null,
            \is_array($data['delete'] ?? null) ? $data['delete'] : null,
            \is_array($data['clear'] ?? null) ? $data['clear'] : null,
            $data,
        );
    }
}
