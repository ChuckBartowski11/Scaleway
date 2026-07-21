<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AppleSilicon;

final readonly class Runner
{
    public function __construct(
        public ?string $id = null,
        public mixed $configuration = null,
        public mixed $status = null,
        public ?string $errorMessage = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            $data['configuration'] ?? null,
            $data['status'] ?? null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            $data,
        );
    }
}
