<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Billing;

final readonly class Invoice
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $organizationName = null,
        public ?string $startDate = null,
        public ?string $stopDate = null,
        public ?string $billingPeriod = null,
        public ?string $issuedDate = null,
        public ?string $dueDate = null,
        public ?array $totalUntaxed = null,
        public ?array $totalTaxed = null,
        public ?array $totalTax = null,
        public ?array $totalDiscount = null,
        public ?array $totalUndiscount = null,
        public ?string $type = null,
        public ?string $state = null,
        public ?int $number = null,
        public ?string $sellerName = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['organization_name']) && \is_scalar($data['organization_name']) ? (string) $data['organization_name'] : null,
            isset($data['start_date']) && \is_scalar($data['start_date']) ? (string) $data['start_date'] : null,
            isset($data['stop_date']) && \is_scalar($data['stop_date']) ? (string) $data['stop_date'] : null,
            isset($data['billing_period']) && \is_scalar($data['billing_period']) ? (string) $data['billing_period'] : null,
            isset($data['issued_date']) && \is_scalar($data['issued_date']) ? (string) $data['issued_date'] : null,
            isset($data['due_date']) && \is_scalar($data['due_date']) ? (string) $data['due_date'] : null,
            \is_array($data['total_untaxed'] ?? null) ? $data['total_untaxed'] : null,
            \is_array($data['total_taxed'] ?? null) ? $data['total_taxed'] : null,
            \is_array($data['total_tax'] ?? null) ? $data['total_tax'] : null,
            \is_array($data['total_discount'] ?? null) ? $data['total_discount'] : null,
            \is_array($data['total_undiscount'] ?? null) ? $data['total_undiscount'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            isset($data['number']) && \is_numeric($data['number']) ? (int) $data['number'] : null,
            isset($data['seller_name']) && \is_scalar($data['seller_name']) ? (string) $data['seller_name'] : null,
            $data,
        );
    }
}
