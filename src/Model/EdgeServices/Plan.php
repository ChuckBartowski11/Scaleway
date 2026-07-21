<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class Plan
{
    public function __construct(
        public mixed $planName = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            $data['plan_name'] ?? null,
            $data,
        );
    }
}
