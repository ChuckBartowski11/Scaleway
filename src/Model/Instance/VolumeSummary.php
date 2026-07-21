<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class VolumeSummary
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?int $size = null,
        public mixed $volumeType = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            $data['volume_type'] ?? null,
            $data,
        );
    }
}
