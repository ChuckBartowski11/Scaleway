<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class ACLRuleSpec
{
    public function __construct(
        public ?string $ipCidr = null,
        public ?string $description = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['ip_cidr']) && \is_scalar($data['ip_cidr']) ? (string) $data['ip_cidr'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            $data,
        );
    }
}
