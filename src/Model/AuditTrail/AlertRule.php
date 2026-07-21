<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class AlertRule
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $status = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            $data,
        );
    }
}
