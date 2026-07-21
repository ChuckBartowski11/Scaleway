<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class Progress
{
    public function __construct(
        public ?string $id = null,
        public array $backupItemGroups = [],
        public ?int $percentage = null,
        public ?string $status = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            \is_array($data['backup_item_groups'] ?? null) ? $data['backup_item_groups'] : [],
            isset($data['percentage']) && \is_numeric($data['percentage']) ? (int) $data['percentage'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            $data,
        );
    }
}
