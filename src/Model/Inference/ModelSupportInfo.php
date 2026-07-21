<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class ModelSupportInfo
{
    public function __construct(
        public array $nodes = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['nodes'] ?? null) ? $data['nodes'] : [],
            $data,
        );
    }
}
