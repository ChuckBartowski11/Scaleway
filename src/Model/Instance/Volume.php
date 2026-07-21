<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Volume
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $exportUri = null,
        public ?int $size = null,
        public ?string $volumeType = null,
        public ?string $creationDate = null,
        public ?string $modificationDate = null,
        public ?string $organization = null,
        public ?string $project = null,
        public array $tags = [],
        public ?array $server = null,
        public ?string $state = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['export_uri']) && \is_scalar($data['export_uri']) ? (string) $data['export_uri'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['volume_type']) && \is_scalar($data['volume_type']) ? (string) $data['volume_type'] : null,
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['modification_date']) && \is_scalar($data['modification_date']) ? (string) $data['modification_date'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['server'] ?? null) ? $data['server'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
