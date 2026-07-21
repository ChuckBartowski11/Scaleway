<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class ModelSupportedQuantization
{
    public function __construct(
        public ?int $quantizationBits = null,
        public ?bool $allowed = null,
        public ?int $maxContextSize = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['quantization_bits']) && \is_numeric($data['quantization_bits']) ? (int) $data['quantization_bits'] : null,
            isset($data['allowed']) ? (bool) $data['allowed'] : null,
            isset($data['max_context_size']) && \is_numeric($data['max_context_size']) ? (int) $data['max_context_size'] : null,
            $data,
        );
    }
}
