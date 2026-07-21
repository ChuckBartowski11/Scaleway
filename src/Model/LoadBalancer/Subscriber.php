<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Subscriber
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?array $emailConfig = null,
        public ?array $webhookConfig = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['email_config'] ?? null) ? $data['email_config'] : null,
            \is_array($data['webhook_config'] ?? null) ? $data['webhook_config'] : null,
            $data,
        );
    }
}
