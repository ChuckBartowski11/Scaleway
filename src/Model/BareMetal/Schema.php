<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class Schema
{
    public function __construct(
        public array $disks = [],
        public array $raids = [],
        public array $filesystems = [],
        public mixed $zfs = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['disks'] ?? null) ? $data['disks'] : [],
            \is_array($data['raids'] ?? null) ? $data['raids'] : [],
            \is_array($data['filesystems'] ?? null) ? $data['filesystems'] : [],
            $data['zfs'] ?? null,
            $data,
        );
    }
}
