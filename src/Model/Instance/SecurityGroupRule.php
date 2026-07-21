<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class SecurityGroupRule
{
    public function __construct(
        public ?string $id = null,
        public mixed $protocol = null,
        public mixed $direction = null,
        public mixed $action = null,
        public ?string $ipRange = null,
        public mixed $destPortFrom = null,
        public mixed $destPortTo = null,
        public ?int $position = null,
        public ?bool $editable = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            $data['protocol'] ?? null,
            $data['direction'] ?? null,
            $data['action'] ?? null,
            isset($data['ip_range']) && \is_scalar($data['ip_range']) ? (string) $data['ip_range'] : null,
            $data['dest_port_from'] ?? null,
            $data['dest_port_to'] ?? null,
            isset($data['position']) && \is_numeric($data['position']) ? (int) $data['position'] : null,
            isset($data['editable']) ? (bool) $data['editable'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
