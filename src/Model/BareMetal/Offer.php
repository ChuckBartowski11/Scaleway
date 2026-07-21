<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\BareMetal;

final readonly class Offer
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $stock = null,
        public ?int $bandwidth = null,
        public ?int $maxBandwidth = null,
        public ?string $commercialRange = null,
        public ?array $pricePerHour = null,
        public ?array $pricePerMonth = null,
        public array $disks = [],
        public ?bool $enable = null,
        public array $cpus = [],
        public array $memories = [],
        public ?string $quotaName = null,
        public array $persistentMemories = [],
        public array $raidControllers = [],
        public array $incompatibleOsIds = [],
        public ?string $subscriptionPeriod = null,
        public ?string $operationPath = null,
        public ?array $fee = null,
        public array $options = [],
        public ?int $privateBandwidth = null,
        public ?bool $sharedBandwidth = null,
        public array $tags = [],
        public array $gpus = [],
        public ?string $monthlyOfferId = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['stock']) && \is_scalar($data['stock']) ? (string) $data['stock'] : null,
            isset($data['bandwidth']) && \is_numeric($data['bandwidth']) ? (int) $data['bandwidth'] : null,
            isset($data['max_bandwidth']) && \is_numeric($data['max_bandwidth']) ? (int) $data['max_bandwidth'] : null,
            isset($data['commercial_range']) && \is_scalar($data['commercial_range']) ? (string) $data['commercial_range'] : null,
            \is_array($data['price_per_hour'] ?? null) ? $data['price_per_hour'] : null,
            \is_array($data['price_per_month'] ?? null) ? $data['price_per_month'] : null,
            \is_array($data['disks'] ?? null) ? $data['disks'] : [],
            isset($data['enable']) ? (bool) $data['enable'] : null,
            \is_array($data['cpus'] ?? null) ? $data['cpus'] : [],
            \is_array($data['memories'] ?? null) ? $data['memories'] : [],
            isset($data['quota_name']) && \is_scalar($data['quota_name']) ? (string) $data['quota_name'] : null,
            \is_array($data['persistent_memories'] ?? null) ? $data['persistent_memories'] : [],
            \is_array($data['raid_controllers'] ?? null) ? $data['raid_controllers'] : [],
            \is_array($data['incompatible_os_ids'] ?? null) ? $data['incompatible_os_ids'] : [],
            isset($data['subscription_period']) && \is_scalar($data['subscription_period']) ? (string) $data['subscription_period'] : null,
            isset($data['operation_path']) && \is_scalar($data['operation_path']) ? (string) $data['operation_path'] : null,
            \is_array($data['fee'] ?? null) ? $data['fee'] : null,
            \is_array($data['options'] ?? null) ? $data['options'] : [],
            isset($data['private_bandwidth']) && \is_numeric($data['private_bandwidth']) ? (int) $data['private_bandwidth'] : null,
            isset($data['shared_bandwidth']) ? (bool) $data['shared_bandwidth'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['gpus'] ?? null) ? $data['gpus'] : [],
            isset($data['monthly_offer_id']) && \is_scalar($data['monthly_offer_id']) ? (string) $data['monthly_offer_id'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
