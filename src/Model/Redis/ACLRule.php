<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class ACLRule
{
    public function __construct(
        public ?string $id = null,
        public ?string $ipCidr = null,
        public ?string $description = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['ip_cidr']) && \is_scalar($data['ip_cidr']) ? (string) $data['ip_cidr'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            $data,
        );
    }
}
