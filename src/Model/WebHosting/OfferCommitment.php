<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class OfferCommitment
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?bool $isDefault = null,
        public ?string $billingMode = null,
        public ?string $billingOperationPath = null,
        public ?array $price = null,
        public ?int $durationInMonth = null,
        public mixed $next = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['is_default']) ? (bool) $data['is_default'] : null,
            isset($data['billing_mode']) && \is_scalar($data['billing_mode']) ? (string) $data['billing_mode'] : null,
            isset($data['billing_operation_path']) && \is_scalar($data['billing_operation_path']) ? (string) $data['billing_operation_path'] : null,
            \is_array($data['price'] ?? null) ? $data['price'] : null,
            isset($data['duration_in_month']) && \is_numeric($data['duration_in_month']) ? (int) $data['duration_in_month'] : null,
            $data['next'] ?? null,
            $data,
        );
    }
}
