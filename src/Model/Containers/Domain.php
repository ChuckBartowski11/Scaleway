<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Containers;

final readonly class Domain
{
    public function __construct(
        public ?string $id = null,
        public ?string $hostname = null,
        public ?string $containerId = null,
        public ?string $url = null,
        public ?string $status = null,
        public ?string $errorMessage = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['hostname']) && \is_scalar($data['hostname']) ? (string) $data['hostname'] : null,
            isset($data['container_id']) && \is_scalar($data['container_id']) ? (string) $data['container_id'] : null,
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            $data,
        );
    }
}
