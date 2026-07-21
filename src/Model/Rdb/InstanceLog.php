<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class InstanceLog
{
    public function __construct(
        public ?string $downloadUrl = null,
        public ?string $id = null,
        public ?string $status = null,
        public ?string $nodeName = null,
        public ?string $expiresAt = null,
        public ?string $createdAt = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['download_url']) && \is_scalar($data['download_url']) ? (string) $data['download_url'] : null,
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['node_name']) && \is_scalar($data['node_name']) ? (string) $data['node_name'] : null,
            isset($data['expires_at']) && \is_scalar($data['expires_at']) ? (string) $data['expires_at'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
