<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class BackendServerStats
{
    public function __construct(
        public ?string $instanceId = null,
        public ?string $backendId = null,
        public ?string $ip = null,
        public ?string $serverState = null,
        public ?string $serverStateChangedAt = null,
        public ?string $lastHealthCheckStatus = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['instance_id']) && \is_scalar($data['instance_id']) ? (string) $data['instance_id'] : null,
            isset($data['backend_id']) && \is_scalar($data['backend_id']) ? (string) $data['backend_id'] : null,
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            isset($data['server_state']) && \is_scalar($data['server_state']) ? (string) $data['server_state'] : null,
            isset($data['server_state_changed_at']) && \is_scalar($data['server_state_changed_at']) ? (string) $data['server_state_changed_at'] : null,
            isset($data['last_health_check_status']) && \is_scalar($data['last_health_check_status']) ? (string) $data['last_health_check_status'] : null,
            $data,
        );
    }
}
