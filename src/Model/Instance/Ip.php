<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Ip
{
    public function __construct(
        public ?string $id = null,
        public ?string $address = null,
        public mixed $reverse = null,
        public mixed $server = null,
        public ?string $organization = null,
        public array $tags = [],
        public ?string $project = null,
        public mixed $type = null,
        public mixed $state = null,
        public ?string $prefix = null,
        public ?string $ipamId = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['address']) && \is_scalar($data['address']) ? (string) $data['address'] : null,
            $data['reverse'] ?? null,
            $data['server'] ?? null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            $data['type'] ?? null,
            $data['state'] ?? null,
            isset($data['prefix']) && \is_scalar($data['prefix']) ? (string) $data['prefix'] : null,
            isset($data['ipam_id']) && \is_scalar($data['ipam_id']) ? (string) $data['ipam_id'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
