<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class Endpoint
{
    public function __construct(
        public ?int $port = null,
        public ?array $privateNetwork = null,
        public ?array $publicNetwork = null,
        public array $ips = [],
        public ?string $id = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['port']) && \is_numeric($data['port']) ? (int) $data['port'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            \is_array($data['public_network'] ?? null) ? $data['public_network'] : null,
            \is_array($data['ips'] ?? null) ? $data['ips'] : [],
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            $data,
        );
    }
}
