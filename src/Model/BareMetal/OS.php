<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class OS
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $version = null,
        public ?string $logoUrl = null,
        public ?array $ssh = null,
        public ?array $user = null,
        public ?array $password = null,
        public ?array $serviceUser = null,
        public ?array $servicePassword = null,
        public ?bool $enabled = null,
        public ?bool $licenseRequired = null,
        public ?bool $allowed = null,
        public ?bool $customPartitioningSupported = null,
        public ?bool $cloudInitSupported = null,
        public ?string $cloudInitVersion = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['logo_url']) && \is_scalar($data['logo_url']) ? (string) $data['logo_url'] : null,
            \is_array($data['ssh'] ?? null) ? $data['ssh'] : null,
            \is_array($data['user'] ?? null) ? $data['user'] : null,
            \is_array($data['password'] ?? null) ? $data['password'] : null,
            \is_array($data['service_user'] ?? null) ? $data['service_user'] : null,
            \is_array($data['service_password'] ?? null) ? $data['service_password'] : null,
            isset($data['enabled']) ? (bool) $data['enabled'] : null,
            isset($data['license_required']) ? (bool) $data['license_required'] : null,
            isset($data['allowed']) ? (bool) $data['allowed'] : null,
            isset($data['custom_partitioning_supported']) ? (bool) $data['custom_partitioning_supported'] : null,
            isset($data['cloud_init_supported']) ? (bool) $data['cloud_init_supported'] : null,
            isset($data['cloud_init_version']) && \is_scalar($data['cloud_init_version']) ? (string) $data['cloud_init_version'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
