<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class Database
{
    public function __construct(
        public ?string $name = null,
        public ?string $owner = null,
        public ?bool $managed = null,
        public ?int $size = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['owner']) && \is_scalar($data['owner']) ? (string) $data['owner'] : null,
            isset($data['managed']) ? (bool) $data['managed'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            $data,
        );
    }
}
