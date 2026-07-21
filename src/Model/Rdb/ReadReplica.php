<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class ReadReplica
{
    public function __construct(
        public ?string $id = null,
        public array $endpoints = [],
        public ?string $status = null,
        public ?string $region = null,
        public ?bool $sameZone = null,
        public ?string $instanceId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            \is_array($data['endpoints'] ?? null) ? $data['endpoints'] : [],
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['same_zone']) ? (bool) $data['same_zone'] : null,
            isset($data['instance_id']) && \is_scalar($data['instance_id']) ? (string) $data['instance_id'] : null,
            $data,
        );
    }
}
