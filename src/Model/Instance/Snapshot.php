<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Snapshot
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organization = null,
        public ?string $project = null,
        public array $tags = [],
        public ?string $volumeType = null,
        public ?int $size = null,
        public ?string $state = null,
        public ?array $baseVolume = null,
        public ?string $creationDate = null,
        public ?string $modificationDate = null,
        public ?string $zone = null,
        public ?string $errorReason = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['volume_type']) && \is_scalar($data['volume_type']) ? (string) $data['volume_type'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            \is_array($data['base_volume'] ?? null) ? $data['base_volume'] : null,
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['modification_date']) && \is_scalar($data['modification_date']) ? (string) $data['modification_date'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['error_reason']) && \is_scalar($data['error_reason']) ? (string) $data['error_reason'] : null,
            $data,
        );
    }
}
