<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class SamlCertificate
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $origin = null,
        public ?string $content = null,
        public ?string $expiresAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['origin']) && \is_scalar($data['origin']) ? (string) $data['origin'] : null,
            isset($data['content']) && \is_scalar($data['content']) ? (string) $data['content'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            $data,
        );
    }
}
