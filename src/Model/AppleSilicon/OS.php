<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AppleSilicon;

final readonly class OS
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $label = null,
        public ?string $imageUrl = null,
        public ?string $family = null,
        public ?bool $isBeta = null,
        public ?string $version = null,
        public ?string $xcodeVersion = null,
        public array $compatibleServerTypes = [],
        public ?string $releaseNotesUrl = null,
        public ?string $description = null,
        public array $tags = [],
        public array $supportedServerTypes = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['label']) && \is_scalar($data['label']) ? (string) $data['label'] : null,
            isset($data['image_url']) && \is_scalar($data['image_url']) ? (string) $data['image_url'] : null,
            isset($data['family']) && \is_scalar($data['family']) ? (string) $data['family'] : null,
            isset($data['is_beta']) ? (bool) $data['is_beta'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['xcode_version']) && \is_scalar($data['xcode_version']) ? (string) $data['xcode_version'] : null,
            \is_array($data['compatible_server_types'] ?? null) ? $data['compatible_server_types'] : [],
            isset($data['release_notes_url']) && \is_scalar($data['release_notes_url']) ? (string) $data['release_notes_url'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['supported_server_types'] ?? null) ? $data['supported_server_types'] : [],
            $data,
        );
    }
}
