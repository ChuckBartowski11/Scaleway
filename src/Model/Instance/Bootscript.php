<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Bootscript
{
    public function __construct(
        public mixed $architecture = null,
        public ?string $bootcmdargs = null,
        public ?bool $default = null,
        public ?string $dtb = null,
        public ?string $id = null,
        public ?string $initrd = null,
        public ?string $kernel = null,
        public ?string $organization = null,
        public ?bool $public = null,
        public ?string $title = null,
        public ?string $project = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            $data['architecture'] ?? null,
            isset($data['bootcmdargs']) && \is_scalar($data['bootcmdargs']) ? (string) $data['bootcmdargs'] : null,
            isset($data['default']) ? (bool) $data['default'] : null,
            isset($data['dtb']) && \is_scalar($data['dtb']) ? (string) $data['dtb'] : null,
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['initrd']) && \is_scalar($data['initrd']) ? (string) $data['initrd'] : null,
            isset($data['kernel']) && \is_scalar($data['kernel']) ? (string) $data['kernel'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['public']) ? (bool) $data['public'] : null,
            isset($data['title']) && \is_scalar($data['title']) ? (string) $data['title'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
