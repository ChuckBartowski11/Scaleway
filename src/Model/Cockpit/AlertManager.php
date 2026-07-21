<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class AlertManager
{
    public function __construct(
        public ?string $alertManagerUrl = null,
        public ?bool $alertManagerEnabled = null,
        public ?bool $managedAlertsEnabled = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['alert_manager_url']) && \is_scalar($data['alert_manager_url']) ? (string) $data['alert_manager_url'] : null,
            isset($data['alert_manager_enabled']) ? (bool) $data['alert_manager_enabled'] : null,
            isset($data['managed_alerts_enabled']) ? (bool) $data['managed_alerts_enabled'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
