<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class LbStats
{
    public function __construct(
        public array $backendServersStats = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['backend_servers_stats'] ?? null) ? $data['backend_servers_stats'] : [],
            $data,
        );
    }
}
