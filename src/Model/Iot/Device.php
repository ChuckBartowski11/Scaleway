<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iot;

final readonly class Device
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $status = null,
        public ?string $hubId = null,
        public ?string $lastActivityAt = null,
        public ?bool $isConnected = null,
        public ?bool $allowInsecure = null,
        public ?bool $allowMultipleConnections = null,
        public ?array $messageFilters = null,
        public ?bool $hasCustomCertificate = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['hub_id']) && \is_scalar($data['hub_id']) ? (string) $data['hub_id'] : null,
            isset($data['last_activity_at']) && \is_scalar($data['last_activity_at']) ? (string) $data['last_activity_at'] : null,
            isset($data['is_connected']) ? (bool) $data['is_connected'] : null,
            isset($data['allow_insecure']) ? (bool) $data['allow_insecure'] : null,
            isset($data['allow_multiple_connections']) ? (bool) $data['allow_multiple_connections'] : null,
            \is_array($data['message_filters'] ?? null) ? $data['message_filters'] : null,
            isset($data['has_custom_certificate']) ? (bool) $data['has_custom_certificate'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
