<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Connection
{
    public function __construct(
        public ?array $organization = null,
        public ?array $user = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['organization'] ?? null) ? $data['organization'] : null,
            \is_array($data['user'] ?? null) ? $data['user'] : null,
            $data,
        );
    }
}
