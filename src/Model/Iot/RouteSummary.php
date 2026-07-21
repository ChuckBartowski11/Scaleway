<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iot;

final readonly class RouteSummary
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $hubId = null,
        public ?string $topic = null,
        public ?string $type = null,
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
            isset($data['hub_id']) && \is_scalar($data['hub_id']) ? (string) $data['hub_id'] : null,
            isset($data['topic']) && \is_scalar($data['topic']) ? (string) $data['topic'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
