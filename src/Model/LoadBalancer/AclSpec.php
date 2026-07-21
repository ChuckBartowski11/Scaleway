<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class AclSpec
{
    public function __construct(
        public ?string $name = null,
        public ?array $action = null,
        public ?array $match = null,
        public ?int $index = null,
        public ?string $description = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['action'] ?? null) ? $data['action'] : null,
            \is_array($data['match'] ?? null) ? $data['match'] : null,
            isset($data['index']) && \is_numeric($data['index']) ? (int) $data['index'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            $data,
        );
    }
}
