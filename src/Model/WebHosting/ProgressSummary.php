<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class ProgressSummary
{
    public function __construct(
        public ?string $id = null,
        public ?int $backupItemsCount = null,
        public ?int $percentage = null,
        public ?string $status = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['backup_items_count']) && \is_numeric($data['backup_items_count']) ? (int) $data['backup_items_count'] : null,
            isset($data['percentage']) && \is_numeric($data['percentage']) ? (int) $data['percentage'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            $data,
        );
    }
}
