<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Vpc;

final readonly class AclRule
{
    public function __construct(
        public ?string $protocol = null,
        public ?string $source = null,
        public ?int $srcPortLow = null,
        public ?int $srcPortHigh = null,
        public ?string $destination = null,
        public ?int $dstPortLow = null,
        public ?int $dstPortHigh = null,
        public ?string $action = null,
        public ?string $description = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['protocol']) && \is_scalar($data['protocol']) ? (string) $data['protocol'] : null,
            isset($data['source']) && \is_scalar($data['source']) ? (string) $data['source'] : null,
            isset($data['src_port_low']) && \is_numeric($data['src_port_low']) ? (int) $data['src_port_low'] : null,
            isset($data['src_port_high']) && \is_numeric($data['src_port_high']) ? (int) $data['src_port_high'] : null,
            isset($data['destination']) && \is_scalar($data['destination']) ? (string) $data['destination'] : null,
            isset($data['dst_port_low']) && \is_numeric($data['dst_port_low']) ? (int) $data['dst_port_low'] : null,
            isset($data['dst_port_high']) && \is_numeric($data['dst_port_high']) ? (int) $data['dst_port_high'] : null,
            isset($data['action']) && \is_scalar($data['action']) ? (string) $data['action'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            $data,
        );
    }
}
