<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Rdb;

final readonly class Maintenance
{
    public function __construct(
        public ?string $startsAt = null,
        public ?string $stopsAt = null,
        public ?string $closedAt = null,
        public ?string $reason = null,
        public ?string $status = null,
        public ?string $forcedAt = null,
        public ?bool $isApplicable = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['starts_at']) && \is_scalar($data['starts_at']) ? (string) $data['starts_at'] : null,
            isset($data['stops_at']) && \is_scalar($data['stops_at']) ? (string) $data['stops_at'] : null,
            isset($data['closed_at']) && \is_scalar($data['closed_at']) ? (string) $data['closed_at'] : null,
            isset($data['reason']) && \is_scalar($data['reason']) ? (string) $data['reason'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['forced_at']) && \is_scalar($data['forced_at']) ? (string) $data['forced_at'] : null,
            isset($data['is_applicable']) ? (bool) $data['is_applicable'] : null,
            $data,
        );
    }
}
