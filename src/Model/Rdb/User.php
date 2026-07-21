<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class User
{
    public function __construct(
        public ?string $name = null,
        public ?bool $isAdmin = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['is_admin']) ? (bool) $data['is_admin'] : null,
            $data,
        );
    }
}
