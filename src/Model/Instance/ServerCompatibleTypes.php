<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class ServerCompatibleTypes
{
    public function __construct(
        public array $compatibleTypes = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['compatible_types'] ?? null) ? $data['compatible_types'] : [],
            $data,
        );
    }
}
