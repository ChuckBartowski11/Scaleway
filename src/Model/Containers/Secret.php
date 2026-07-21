<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Containers;

final readonly class Secret
{
    public function __construct(
        public ?string $key = null,
        public mixed $value = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['key']) && \is_scalar($data['key']) ? (string) $data['key'] : null,
            $data['value'] ?? null,
            $data,
        );
    }
}
