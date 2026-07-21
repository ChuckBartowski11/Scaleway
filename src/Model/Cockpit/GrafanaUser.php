<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class GrafanaUser
{
    public function __construct(
        public ?int $id = null,
        public ?string $login = null,
        public ?string $role = null,
        public ?string $password = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_numeric($data['id']) ? (int) $data['id'] : null,
            isset($data['login']) && \is_scalar($data['login']) ? (string) $data['login'] : null,
            isset($data['role']) && \is_scalar($data['role']) ? (string) $data['role'] : null,
            isset($data['password']) && \is_scalar($data['password']) ? (string) $data['password'] : null,
            $data,
        );
    }
}
