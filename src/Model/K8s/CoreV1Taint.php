<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class CoreV1Taint
{
    public function __construct(
        public ?string $key = null,
        public ?string $value = null,
        public ?string $effect = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['key']) && \is_scalar($data['key']) ? (string) $data['key'] : null,
            isset($data['value']) && \is_scalar($data['value']) ? (string) $data['value'] : null,
            isset($data['effect']) && \is_scalar($data['effect']) ? (string) $data['effect'] : null,
            $data,
        );
    }
}
