<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Pool
{
    public function __construct(
        public ?string $projectId = null,
        public ?string $status = null,
        public ?string $details = null,
        public ?string $zone = null,
        public array $ips = [],
        public ?string $reverse = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['details']) && \is_scalar($data['details']) ? (string) $data['details'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            \is_array($data['ips'] ?? null) ? $data['ips'] : [],
            isset($data['reverse']) && \is_scalar($data['reverse']) ? (string) $data['reverse'] : null,
            $data,
        );
    }
}
