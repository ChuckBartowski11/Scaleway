<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\KeyManager;

final readonly class PublicKey
{
    public function __construct(
        public ?string $pem = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['pem']) && \is_scalar($data['pem']) ? (string) $data['pem'] : null,
            $data,
        );
    }
}
