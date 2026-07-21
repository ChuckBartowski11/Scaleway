<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class Endpoint
{
    public function __construct(
        public ?string $id = null,
        public ?string $dnsRecord = null,
        public ?int $port = null,
        public ?array $privateNetwork = null,
        public ?array $publicNetwork = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['dns_record']) && \is_scalar($data['dns_record']) ? (string) $data['dns_record'] : null,
            isset($data['port']) && \is_numeric($data['port']) ? (int) $data['port'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            \is_array($data['public_network'] ?? null) ? $data['public_network'] : null,
            $data,
        );
    }
}
