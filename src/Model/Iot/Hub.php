<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iot;

final readonly class Hub
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $productPlan = null,
        public ?bool $enabled = null,
        public ?int $deviceCount = null,
        public ?int $connectedDeviceCount = null,
        public ?string $endpoint = null,
        public ?bool $disableEvents = null,
        public ?string $eventsTopicPrefix = null,
        public ?string $region = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $projectId = null,
        public ?string $organizationId = null,
        public ?bool $enableDeviceAutoProvisioning = null,
        public ?bool $hasCustomCa = null,
        public ?array $twinsGraphiteConfig = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['product_plan']) && \is_scalar($data['product_plan']) ? (string) $data['product_plan'] : null,
            isset($data['enabled']) ? (bool) $data['enabled'] : null,
            isset($data['device_count']) && \is_numeric($data['device_count']) ? (int) $data['device_count'] : null,
            isset($data['connected_device_count']) && \is_numeric($data['connected_device_count']) ? (int) $data['connected_device_count'] : null,
            isset($data['endpoint']) && \is_scalar($data['endpoint']) ? (string) $data['endpoint'] : null,
            isset($data['disable_events']) ? (bool) $data['disable_events'] : null,
            isset($data['events_topic_prefix']) && \is_scalar($data['events_topic_prefix']) ? (string) $data['events_topic_prefix'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['enable_device_auto_provisioning']) ? (bool) $data['enable_device_auto_provisioning'] : null,
            isset($data['has_custom_ca']) ? (bool) $data['has_custom_ca'] : null,
            \is_array($data['twins_graphite_config'] ?? null) ? $data['twins_graphite_config'] : null,
            $data,
        );
    }
}
