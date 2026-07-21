<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class UpgradableVersion
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $version = null,
        public ?string $minorVersion = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['minor_version']) && \is_scalar($data['minor_version']) ? (string) $data['minor_version'] : null,
            $data,
        );
    }
}
