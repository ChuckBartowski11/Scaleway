<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Image
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public mixed $arch = null,
        public ?string $creationDate = null,
        public ?string $modificationDate = null,
        public mixed $defaultBootscript = null,
        public ?array $extraVolumes = null,
        public ?string $fromServer = null,
        public ?string $organization = null,
        public ?bool $public = null,
        public mixed $rootVolume = null,
        public mixed $state = null,
        public ?string $project = null,
        public array $tags = [],
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            $data['arch'] ?? null,
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['modification_date']) && \is_scalar($data['modification_date']) ? (string) $data['modification_date'] : null,
            $data['default_bootscript'] ?? null,
            \is_array($data['extra_volumes'] ?? null) ? $data['extra_volumes'] : null,
            isset($data['from_server']) && \is_scalar($data['from_server']) ? (string) $data['from_server'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['public']) ? (bool) $data['public'] : null,
            $data['root_volume'] ?? null,
            $data['state'] ?? null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
