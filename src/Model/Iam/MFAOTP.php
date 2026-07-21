<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class MFAOTP
{
    public function __construct(
        public ?string $secret = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['secret']) && \is_scalar($data['secret']) ? (string) $data['secret'] : null,
            $data,
        );
    }
}
