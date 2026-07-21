<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AppleSilicon;

final readonly class ServerType
{
    public function __construct(
        public ?array $cpu = null,
        public ?array $disk = null,
        public ?string $name = null,
        public ?array $memory = null,
        public ?string $stock = null,
        public ?string $minimumLeaseDuration = null,
        public ?array $gpu = null,
        public ?array $network = null,
        public ?array $defaultOs = null,
        public ?array $npu = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['cpu'] ?? null) ? $data['cpu'] : null,
            \is_array($data['disk'] ?? null) ? $data['disk'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['memory'] ?? null) ? $data['memory'] : null,
            isset($data['stock']) && \is_scalar($data['stock']) ? (string) $data['stock'] : null,
            isset($data['minimum_lease_duration']) && \is_scalar($data['minimum_lease_duration']) ? (string) $data['minimum_lease_duration'] : null,
            \is_array($data['gpu'] ?? null) ? $data['gpu'] : null,
            \is_array($data['network'] ?? null) ? $data['network'] : null,
            \is_array($data['default_os'] ?? null) ? $data['default_os'] : null,
            \is_array($data['npu'] ?? null) ? $data['npu'] : null,
            $data,
        );
    }
}
