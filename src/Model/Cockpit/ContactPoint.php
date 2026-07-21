<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class ContactPoint
{
    public function __construct(
        public ?array $email = null,
        public ?string $region = null,
        public ?bool $sendResolvedNotifications = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['email'] ?? null) ? $data['email'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['send_resolved_notifications']) ? (bool) $data['send_resolved_notifications'] : null,
            $data,
        );
    }
}
