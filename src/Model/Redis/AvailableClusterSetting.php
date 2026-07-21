<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Redis;

final readonly class AvailableClusterSetting
{
    public function __construct(
        public ?string $name = null,
        public ?string $defaultValue = null,
        public ?string $type = null,
        public ?string $description = null,
        public ?int $maxValue = null,
        public ?int $minValue = null,
        public ?string $regex = null,
        public ?bool $deprecated = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['default_value']) && \is_scalar($data['default_value']) ? (string) $data['default_value'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['max_value']) && \is_numeric($data['max_value']) ? (int) $data['max_value'] : null,
            isset($data['min_value']) && \is_numeric($data['min_value']) ? (int) $data['min_value'] : null,
            isset($data['regex']) && \is_scalar($data['regex']) ? (string) $data['regex'] : null,
            isset($data['deprecated']) ? (bool) $data['deprecated'] : null,
            $data,
        );
    }
}
