<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\MongoDb;

final readonly class Version
{
    public function __construct(
        public ?string $version = null,
        public ?string $endOfLifeAt = null,
        public ?string $releasedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['end_of_life_at']) && \is_scalar($data['end_of_life_at']) ? (string) $data['end_of_life_at'] : null,
            isset($data['released_at']) && \is_scalar($data['released_at']) ? (string) $data['released_at'] : null,
            $data,
        );
    }
}
