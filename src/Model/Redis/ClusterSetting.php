<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class ClusterSetting
{
    public function __construct(
        public ?string $value = null,
        public ?string $name = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['value']) && \is_scalar($data['value']) ? (string) $data['value'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            $data,
        );
    }
}
