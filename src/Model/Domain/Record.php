<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Domain;

final readonly class Record
{
    public function __construct(
        public ?string $data = null,
        public ?string $name = null,
        public ?int $priority = null,
        public ?int $ttl = null,
        public mixed $type = null,
        public mixed $comment = null,
        public ?array $geoIpConfig = null,
        public ?array $httpServiceConfig = null,
        public ?array $weightedConfig = null,
        public ?array $viewConfig = null,
        public ?string $id = null,
        public ?string $updatedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['data']) && \is_scalar($data['data']) ? (string) $data['data'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['priority']) && \is_numeric($data['priority']) ? (int) $data['priority'] : null,
            isset($data['ttl']) && \is_numeric($data['ttl']) ? (int) $data['ttl'] : null,
            $data['type'] ?? null,
            $data['comment'] ?? null,
            \is_array($data['geo_ip_config'] ?? null) ? $data['geo_ip_config'] : null,
            \is_array($data['http_service_config'] ?? null) ? $data['http_service_config'] : null,
            \is_array($data['weighted_config'] ?? null) ? $data['weighted_config'] : null,
            \is_array($data['view_config'] ?? null) ? $data['view_config'] : null,
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            $data,
        );
    }
}
