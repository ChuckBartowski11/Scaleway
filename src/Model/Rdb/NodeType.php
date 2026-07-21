<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class NodeType
{
    public function __construct(
        public ?string $name = null,
        public ?string $stockStatus = null,
        public ?string $description = null,
        public ?int $vcpus = null,
        public ?int $memory = null,
        public ?array $volumeConstraint = null,
        public ?bool $isBssdCompatible = null,
        public ?bool $disabled = null,
        public ?bool $beta = null,
        public array $availableVolumeTypes = [],
        public ?bool $isHaRequired = null,
        public ?string $generation = null,
        public ?string $instanceRange = null,
        public ?string $region = null,
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
            \is_array($data['volume_constraint'] ?? null) ? $data['volume_constraint'] : null,
            isset($data['is_bssd_compatible']) ? (bool) $data['is_bssd_compatible'] : null,
            isset($data['disabled']) ? (bool) $data['disabled'] : null,
            isset($data['beta']) ? (bool) $data['beta'] : null,
            \is_array($data['available_volume_types'] ?? null) ? $data['available_volume_types'] : [],
            isset($data['is_ha_required']) ? (bool) $data['is_ha_required'] : null,
            isset($data['generation']) && \is_scalar($data['generation']) ? (string) $data['generation'] : null,
            isset($data['instance_range']) && \is_scalar($data['instance_range']) ? (string) $data['instance_range'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
