<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class Eula
{
    public function __construct(
        public ?string $content = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['content']) && \is_scalar($data['content']) ? (string) $data['content'] : null,
            $data,
        );
    }
}
