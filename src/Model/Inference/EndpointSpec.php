<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Inference;

final readonly class EndpointSpec
{
    public function __construct(
        public ?array $publicNetwork = null,
        public ?array $privateNetwork = null,
        public ?bool $disableAuth = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['public_network'] ?? null) ? $data['public_network'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            isset($data['disable_auth']) ? (bool) $data['disable_auth'] : null,
            $data,
        );
    }
}
