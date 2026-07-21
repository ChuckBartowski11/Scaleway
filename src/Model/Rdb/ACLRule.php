<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class ACLRule
{
    public function __construct(
        public ?string $ip = null,
        public mixed $protocol = null,
        public mixed $direction = null,
        public mixed $action = null,
        public ?string $description = null,
        public ?int $port = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            $data['protocol'] ?? null,
            $data['direction'] ?? null,
            $data['action'] ?? null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['port']) && \is_numeric($data['port']) ? (int) $data['port'] : null,
            $data,
        );
    }
}
