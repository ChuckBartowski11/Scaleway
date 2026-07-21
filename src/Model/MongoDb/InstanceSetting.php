<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class InstanceSetting
{
    public function __construct(
        public ?string $name = null,
        public ?string $value = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['value']) && \is_scalar($data['value']) ? (string) $data['value'] : null,
            $data,
        );
    }
}
