<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\VpcGw;

final readonly class PatRule
{
    public function __construct(
        public ?string $id = null,
        public ?string $gatewayId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?int $publicPort = null,
        public ?string $privateIp = null,
        public ?int $privatePort = null,
        public ?string $protocol = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['gateway_id']) && \is_scalar($data['gateway_id']) ? (string) $data['gateway_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['public_port']) && \is_numeric($data['public_port']) ? (int) $data['public_port'] : null,
            isset($data['private_ip']) && \is_scalar($data['private_ip']) ? (string) $data['private_ip'] : null,
            isset($data['private_port']) && \is_numeric($data['private_port']) ? (int) $data['private_port'] : null,
            isset($data['protocol']) && \is_scalar($data['protocol']) ? (string) $data['protocol'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
