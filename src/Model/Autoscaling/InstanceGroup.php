<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Autoscaling;

final readonly class InstanceGroup
{
    public function __construct(
        public ?string $id = null,
        public ?string $projectId = null,
        public ?string $name = null,
        public array $tags = [],
        public ?string $instanceTemplateId = null,
        public ?array $capacity = null,
        public ?array $loadbalancer = null,
        public array $errorMessages = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['instance_template_id']) && \is_scalar($data['instance_template_id']) ? (string) $data['instance_template_id'] : null,
            \is_array($data['capacity'] ?? null) ? $data['capacity'] : null,
            \is_array($data['loadbalancer'] ?? null) ? $data['loadbalancer'] : null,
            \is_array($data['error_messages'] ?? null) ? $data['error_messages'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
