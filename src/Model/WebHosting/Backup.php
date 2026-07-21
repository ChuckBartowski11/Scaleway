<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class Backup
{
    public function __construct(
        public ?string $id = null,
        public ?int $size = null,
        public ?string $createdAt = null,
        public ?string $status = null,
        public ?int $totalItems = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['size']) && \is_numeric($data['size']) ? (int) $data['size'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['total_items']) && \is_numeric($data['total_items']) ? (int) $data['total_items'] : null,
            $data,
        );
    }
}
