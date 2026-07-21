<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iot;

final readonly class Network
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?string $endpoint = null,
        public ?string $hubId = null,
        public ?string $createdAt = null,
        public ?string $topicPrefix = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['endpoint']) && \is_scalar($data['endpoint']) ? (string) $data['endpoint'] : null,
            isset($data['hub_id']) && \is_scalar($data['hub_id']) ? (string) $data['hub_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['topic_prefix']) && \is_scalar($data['topic_prefix']) ? (string) $data['topic_prefix'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
