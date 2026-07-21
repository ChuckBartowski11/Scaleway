<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Frontend
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?int $inboundPort = null,
        public ?array $backend = null,
        public ?array $lb = null,
        public ?float $timeoutClient = null,
        public ?array $certificate = null,
        public array $certificateIds = [],
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $enableHttp3 = null,
        public ?int $connectionRateLimit = null,
        public ?bool $enableAccessLogs = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['inbound_port']) && \is_numeric($data['inbound_port']) ? (int) $data['inbound_port'] : null,
            \is_array($data['backend'] ?? null) ? $data['backend'] : null,
            \is_array($data['lb'] ?? null) ? $data['lb'] : null,
            isset($data['timeout_client']) && \is_numeric($data['timeout_client']) ? (float) $data['timeout_client'] : null,
            \is_array($data['certificate'] ?? null) ? $data['certificate'] : null,
            \is_array($data['certificate_ids'] ?? null) ? $data['certificate_ids'] : [],
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['enable_http3']) ? (bool) $data['enable_http3'] : null,
            isset($data['connection_rate_limit']) && \is_numeric($data['connection_rate_limit']) ? (int) $data['connection_rate_limit'] : null,
            isset($data['enable_access_logs']) ? (bool) $data['enable_access_logs'] : null,
            $data,
        );
    }
}
