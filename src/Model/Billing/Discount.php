<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Billing;

final readonly class Discount
{
    public function __construct(
        public ?string $id = null,
        public ?string $creationDate = null,
        public ?string $organizationId = null,
        public ?string $description = null,
        public ?float $value = null,
        public ?float $valueUsed = null,
        public ?float $valueRemaining = null,
        public ?string $mode = null,
        public ?string $startDate = null,
        public ?string $stopDate = null,
        public ?array $coupon = null,
        public array $filters = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['value']) && \is_numeric($data['value']) ? (float) $data['value'] : null,
            isset($data['value_used']) && \is_numeric($data['value_used']) ? (float) $data['value_used'] : null,
            isset($data['value_remaining']) && \is_numeric($data['value_remaining']) ? (float) $data['value_remaining'] : null,
            isset($data['mode']) && \is_scalar($data['mode']) ? (string) $data['mode'] : null,
            isset($data['start_date']) && \is_scalar($data['start_date']) ? (string) $data['start_date'] : null,
            isset($data['stop_date']) && \is_scalar($data['stop_date']) ? (string) $data['stop_date'] : null,
            \is_array($data['coupon'] ?? null) ? $data['coupon'] : null,
            \is_array($data['filters'] ?? null) ? $data['filters'] : [],
            $data,
        );
    }
}
