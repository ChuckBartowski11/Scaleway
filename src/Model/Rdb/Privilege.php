<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class Privilege
{
    public function __construct(
        public ?string $permission = null,
        public ?string $databaseName = null,
        public ?string $userName = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['permission']) && \is_scalar($data['permission']) ? (string) $data['permission'] : null,
            isset($data['database_name']) && \is_scalar($data['database_name']) ? (string) $data['database_name'] : null,
            isset($data['user_name']) && \is_scalar($data['user_name']) ? (string) $data['user_name'] : null,
            $data,
        );
    }
}
