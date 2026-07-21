<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class VolumeServerTemplate
{
    public function __construct(
        public ?string $id = null,
        public ?bool $boot = null,
        public ?string $name = null,
        public ?int $size = null,
        public ?string $volumeType = null,
        public ?string $baseSnapshot = null,
        public ?string $organization = null,
        public ?string $project = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['boot']) ? (bool) $data['boot'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['volume_type']) && \is_scalar($data['volume_type']) ? (string) $data['volume_type'] : null,
            isset($data['base_snapshot']) && \is_scalar($data['base_snapshot']) ? (string) $data['base_snapshot'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            $data,
        );
    }
}
