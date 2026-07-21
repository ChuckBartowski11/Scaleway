<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class Endpoint
{
    public function __construct(
        public ?string $id = null,
        public ?string $url = null,
        public ?array $publicNetwork = null,
        public ?array $privateNetwork = null,
        public ?bool $disableAuth = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            \is_array($data['public_network'] ?? null) ? $data['public_network'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            isset($data['disable_auth']) ? (bool) $data['disable_auth'] : null,
            $data,
        );
    }
}
