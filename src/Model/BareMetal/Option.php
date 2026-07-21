<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class Option
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?bool $manageable = null,
        public ?array $license = null,
        public ?array $publicBandwidth = null,
        public ?array $privateNetwork = null,
        public ?array $remoteAccess = null,
        public ?array $certification = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['manageable']) ? (bool) $data['manageable'] : null,
            \is_array($data['license'] ?? null) ? $data['license'] : null,
            \is_array($data['public_bandwidth'] ?? null) ? $data['public_bandwidth'] : null,
            \is_array($data['private_network'] ?? null) ? $data['private_network'] : null,
            \is_array($data['remote_access'] ?? null) ? $data['remote_access'] : null,
            \is_array($data['certification'] ?? null) ? $data['certification'] : null,
            $data,
        );
    }
}
