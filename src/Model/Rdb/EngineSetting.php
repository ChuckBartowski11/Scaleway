<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class EngineSetting
{
    public function __construct(
        public ?string $name = null,
        public ?string $defaultValue = null,
        public ?bool $hotConfigurable = null,
        public ?string $description = null,
        public ?string $propertyType = null,
        public ?string $unit = null,
        public ?string $stringConstraint = null,
        public ?int $intMin = null,
        public ?int $intMax = null,
        public ?array $floatMin = null,
        public ?array $floatMax = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['default_value']) && \is_scalar($data['default_value']) ? (string) $data['default_value'] : null,
            isset($data['hot_configurable']) ? (bool) $data['hot_configurable'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['property_type']) && \is_scalar($data['property_type']) ? (string) $data['property_type'] : null,
            isset($data['unit']) && \is_scalar($data['unit']) ? (string) $data['unit'] : null,
            isset($data['string_constraint']) && \is_scalar($data['string_constraint']) ? (string) $data['string_constraint'] : null,
            isset($data['int_min']) && \is_numeric($data['int_min']) ? (int) $data['int_min'] : null,
            isset($data['int_max']) && \is_numeric($data['int_max']) ? (int) $data['int_max'] : null,
            \is_array($data['float_min'] ?? null) ? $data['float_min'] : null,
            \is_array($data['float_max'] ?? null) ? $data['float_max'] : null,
            $data,
        );
    }
}
