<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Autoscaling;

final readonly class InstancePolicy
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?array $metric = null,
        public ?string $action = null,
        public ?string $type = null,
        public ?int $value = null,
        public ?int $priority = null,
        public ?string $instanceGroupId = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['metric'] ?? null) ? $data['metric'] : null,
            isset($data['action']) && \is_scalar($data['action']) ? (string) $data['action'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['value']) && \is_numeric($data['value']) ? (int) $data['value'] : null,
            isset($data['priority']) && \is_numeric($data['priority']) ? (int) $data['priority'] : null,
            isset($data['instance_group_id']) && \is_scalar($data['instance_group_id']) ? (string) $data['instance_group_id'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
