<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class NodeType
{
    public function __construct(
        public ?string $name = null,
        public ?string $stockStatus = null,
        public ?string $description = null,
        public ?int $vcpus = null,
        public ?int $memory = null,
        public ?bool $disabled = null,
        public ?bool $beta = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['stock_status']) && \is_scalar($data['stock_status']) ? (string) $data['stock_status'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['vcpus']) && \is_numeric($data['vcpus']) ? (int) $data['vcpus'] : null,
            isset($data['memory']) && \is_numeric($data['memory']) ? (int) $data['memory'] : null,
            isset($data['disabled']) ? (bool) $data['disabled'] : null,
            isset($data['beta']) ? (bool) $data['beta'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
