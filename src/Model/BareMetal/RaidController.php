<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class RaidController
{
    public function __construct(
        public ?string $model = null,
        public array $raidLevel = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['model']) && \is_scalar($data['model']) ? (string) $data['model'] : null,
            \is_array($data['raid_level'] ?? null) ? $data['raid_level'] : [],
            $data,
        );
    }
}
