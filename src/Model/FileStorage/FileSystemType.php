<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\FileStorage;

final readonly class FileSystemType
{
    public function __construct(
        public ?string $name = null,
        public ?array $filesystemPriceGbPerHour = null,
        public ?array $snapshotPriceGbPerHour = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['filesystem_price_gb_per_hour'] ?? null) ? $data['filesystem_price_gb_per_hour'] : null,
            \is_array($data['snapshot_price_gb_per_hour'] ?? null) ? $data['snapshot_price_gb_per_hour'] : null,
            $data,
        );
    }
}
