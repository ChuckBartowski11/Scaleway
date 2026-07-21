<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Containers;

final readonly class Trigger
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $containerId = null,
        public ?string $inputType = null,
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?array $scwSqsConfig = null,
        public ?array $scwNatsConfig = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['container_id']) && \is_scalar($data['container_id']) ? (string) $data['container_id'] : null,
            isset($data['input_type']) && \is_scalar($data['input_type']) ? (string) $data['input_type'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            \is_array($data['scw_sqs_config'] ?? null) ? $data['scw_sqs_config'] : null,
            \is_array($data['scw_nats_config'] ?? null) ? $data['scw_nats_config'] : null,
            $data,
        );
    }
}
