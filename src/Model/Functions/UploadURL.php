<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Functions;

final readonly class UploadURL
{
    public function __construct(
        public ?string $url = null,
        public ?array $headers = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            \is_array($data['headers'] ?? null) ? $data['headers'] : null,
            $data,
        );
    }
}
