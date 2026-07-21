<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class IP
{
    public function __construct(
        public ?string $id = null,
        public ?string $address = null,
        public ?string $reverse = null,
        public ?string $version = null,
        public ?string $reverseStatus = null,
        public ?string $reverseStatusMessage = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['address']) && \is_scalar($data['address']) ? (string) $data['address'] : null,
            isset($data['reverse']) && \is_scalar($data['reverse']) ? (string) $data['reverse'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['reverse_status']) && \is_scalar($data['reverse_status']) ? (string) $data['reverse_status'] : null,
            isset($data['reverse_status_message']) && \is_scalar($data['reverse_status_message']) ? (string) $data['reverse_status_message'] : null,
            $data,
        );
    }
}
