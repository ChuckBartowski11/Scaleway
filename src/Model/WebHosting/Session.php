<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class Session
{
    public function __construct(
        public ?string $url = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            $data,
        );
    }
}
