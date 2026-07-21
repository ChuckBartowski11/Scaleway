<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\FileStorage;

final readonly class Attachment
{
    public function __construct(
        public ?string $id = null,
        public ?string $filesystemId = null,
        public ?string $resourceId = null,
        public ?string $resourceType = null,
        public ?string $zone = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['filesystem_id']) && \is_scalar($data['filesystem_id']) ? (string) $data['filesystem_id'] : null,
            isset($data['resource_id']) && \is_scalar($data['resource_id']) ? (string) $data['resource_id'] : null,
            isset($data['resource_type']) && \is_scalar($data['resource_type']) ? (string) $data['resource_type'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
