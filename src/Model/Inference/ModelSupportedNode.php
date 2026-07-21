<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class ModelSupportedNode
{
    public function __construct(
        public ?string $nodeTypeName = null,
        public array $quantizations = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['node_type_name']) && \is_scalar($data['node_type_name']) ? (string) $data['node_type_name'] : null,
            \is_array($data['quantizations'] ?? null) ? $data['quantizations'] : [],
            $data,
        );
    }
}
