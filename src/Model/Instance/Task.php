<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Task
{
    public function __construct(
        public ?string $id = null,
        public ?string $description = null,
        public ?int $progress = null,
        public ?string $startedAt = null,
        public ?string $terminatedAt = null,
        public ?string $status = null,
        public ?string $hrefFrom = null,
        public ?string $hrefResult = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['progress']) && \is_numeric($data['progress']) ? (int) $data['progress'] : null,
            isset($data['started_at']) && \is_scalar($data['started_at']) ? (string) $data['started_at'] : null,
            isset($data['terminated_at']) && \is_scalar($data['terminated_at']) ? (string) $data['terminated_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['href_from']) && \is_scalar($data['href_from']) ? (string) $data['href_from'] : null,
            isset($data['href_result']) && \is_scalar($data['href_result']) ? (string) $data['href_result'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
