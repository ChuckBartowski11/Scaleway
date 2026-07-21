<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class EndpointSpec
{
    public function __construct(
        public ?array $loadBalancer = null,
        public ?array $privateNetwork = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['load_balancer'] ?? null) ? $data['load_balancer'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            $data,
        );
    }
}
