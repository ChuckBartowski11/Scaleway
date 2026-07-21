<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Autoscaling;

final readonly class InstanceGroupEvent
{
    public function __construct(
        public ?string $id = null,
        public ?string $source = null,
        public ?string $level = null,
        public ?string $name = null,
        public ?string $createdAt = null,
        public ?string $details = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['source']) && \is_scalar($data['source']) ? (string) $data['source'] : null,
            isset($data['level']) && \is_scalar($data['level']) ? (string) $data['level'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['details']) && \is_scalar($data['details']) ? (string) $data['details'] : null,
            $data,
        );
    }
}
