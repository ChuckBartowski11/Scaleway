<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Statistics
{
    public function __construct(
        public ?int $totalCount = null,
        public ?int $newCount = null,
        public ?int $sendingCount = null,
        public ?int $sentCount = null,
        public ?int $failedCount = null,
        public ?int $canceledCount = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['total_count']) && \is_numeric($data['total_count']) ? (int) $data['total_count'] : null,
            isset($data['new_count']) && \is_numeric($data['new_count']) ? (int) $data['new_count'] : null,
            isset($data['sending_count']) && \is_numeric($data['sending_count']) ? (int) $data['sending_count'] : null,
            isset($data['sent_count']) && \is_numeric($data['sent_count']) ? (int) $data['sent_count'] : null,
            isset($data['failed_count']) && \is_numeric($data['failed_count']) ? (int) $data['failed_count'] : null,
            isset($data['canceled_count']) && \is_numeric($data['canceled_count']) ? (int) $data['canceled_count'] : null,
            $data,
        );
    }
}
