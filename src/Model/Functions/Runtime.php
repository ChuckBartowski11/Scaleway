<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Functions;

final readonly class Runtime
{
    public function __construct(
        public ?string $name = null,
        public ?string $language = null,
        public ?string $version = null,
        public ?string $defaultHandler = null,
        public ?string $codeSample = null,
        public mixed $status = null,
        public ?string $statusMessage = null,
        public ?string $extension = null,
        public ?string $implementation = null,
        public ?string $logoUrl = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['language']) && \is_scalar($data['language']) ? (string) $data['language'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['default_handler']) && \is_scalar($data['default_handler']) ? (string) $data['default_handler'] : null,
            isset($data['code_sample']) && \is_scalar($data['code_sample']) ? (string) $data['code_sample'] : null,
            $data['status'] ?? null,
            isset($data['status_message']) && \is_scalar($data['status_message']) ? (string) $data['status_message'] : null,
            isset($data['extension']) && \is_scalar($data['extension']) ? (string) $data['extension'] : null,
            isset($data['implementation']) && \is_scalar($data['implementation']) ? (string) $data['implementation'] : null,
            isset($data['logo_url']) && \is_scalar($data['logo_url']) ? (string) $data['logo_url'] : null,
            $data,
        );
    }
}
