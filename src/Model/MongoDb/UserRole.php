<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class UserRole
{
    public function __construct(
        public ?string $role = null,
        public ?string $databaseName = null,
        public ?bool $anyDatabase = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['role']) && \is_scalar($data['role']) ? (string) $data['role'] : null,
            isset($data['database_name']) && \is_scalar($data['database_name']) ? (string) $data['database_name'] : null,
            isset($data['any_database']) ? (bool) $data['any_database'] : null,
            $data,
        );
    }
}
