<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class BMCAccess
{
    public function __construct(
        public ?string $url = null,
        public ?string $login = null,
        public ?string $password = null,
        public ?string $expiresAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            isset($data['login']) && \is_scalar($data['login']) ? (string) $data['login'] : null,
            isset($data['password']) && \is_scalar($data['password']) ? (string) $data['password'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            $data,
        );
    }
}
