<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class Database
{
    public function __construct(
        public ?string $name = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            $data,
        );
    }
}
