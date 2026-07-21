<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class ReadReplicaEndpointSpec
{
    public function __construct(
        public ?array $directAccess = null,
        public ?array $privateNetwork = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['direct_access'] ?? null) ? $data['direct_access'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            $data,
        );
    }
}
