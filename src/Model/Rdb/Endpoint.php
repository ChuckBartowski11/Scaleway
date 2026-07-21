<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class Endpoint
{
    public function __construct(
        public ?string $id = null,
        public ?string $ip = null,
        public ?int $port = null,
        public ?string $name = null,
        public ?array $privateNetwork = null,
        public ?array $loadBalancer = null,
        public ?array $directAccess = null,
        public ?string $hostname = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            isset($data['port']) && \is_numeric($data['port']) ? (int) $data['port'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            \is_array($data['load_balancer'] ?? null) ? $data['load_balancer'] : null,
            \is_array($data['direct_access'] ?? null) ? $data['direct_access'] : null,
            isset($data['hostname']) && \is_scalar($data['hostname']) ? (string) $data['hostname'] : null,
            $data,
        );
    }
}
