<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Backend
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $forwardProtocol = null,
        public ?int $forwardPort = null,
        public ?string $forwardPortAlgorithm = null,
        public ?string $stickySessions = null,
        public ?string $stickySessionsCookieName = null,
        public ?array $healthCheck = null,
        public array $pool = [],
        public ?array $lb = null,
        public ?bool $sendProxyV2 = null,
        public ?float $timeoutServer = null,
        public ?float $timeoutConnect = null,
        public ?float $timeoutTunnel = null,
        public ?string $onMarkedDownAction = null,
        public ?string $proxyProtocol = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $failoverHost = null,
        public ?bool $sslBridging = null,
        public ?bool $ignoreSslServerVerify = null,
        public ?int $redispatchAttemptCount = null,
        public ?int $maxRetries = null,
        public ?int $maxConnections = null,
        public ?string $timeoutQueue = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['forward_protocol']) && \is_scalar($data['forward_protocol']) ? (string) $data['forward_protocol'] : null,
            isset($data['forward_port']) && \is_numeric($data['forward_port']) ? (int) $data['forward_port'] : null,
            isset($data['forward_port_algorithm']) && \is_scalar($data['forward_port_algorithm']) ? (string) $data['forward_port_algorithm'] : null,
            isset($data['sticky_sessions']) && \is_scalar($data['sticky_sessions']) ? (string) $data['sticky_sessions'] : null,
            isset($data['sticky_sessions_cookie_name']) && \is_scalar($data['sticky_sessions_cookie_name']) ? (string) $data['sticky_sessions_cookie_name'] : null,
            \is_array($data['health_check'] ?? null) ? $data['health_check'] : null,
            \is_array($data['pool'] ?? null) ? $data['pool'] : [],
            \is_array($data['lb'] ?? null) ? $data['lb'] : null,
            isset($data['send_proxy_v2']) ? (bool) $data['send_proxy_v2'] : null,
            isset($data['timeout_server']) && \is_numeric($data['timeout_server']) ? (float) $data['timeout_server'] : null,
            isset($data['timeout_connect']) && \is_numeric($data['timeout_connect']) ? (float) $data['timeout_connect'] : null,
            isset($data['timeout_tunnel']) && \is_numeric($data['timeout_tunnel']) ? (float) $data['timeout_tunnel'] : null,
            isset($data['on_marked_down_action']) && \is_scalar($data['on_marked_down_action']) ? (string) $data['on_marked_down_action'] : null,
            isset($data['proxy_protocol']) && \is_scalar($data['proxy_protocol']) ? (string) $data['proxy_protocol'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['failover_host']) && \is_scalar($data['failover_host']) ? (string) $data['failover_host'] : null,
            isset($data['ssl_bridging']) ? (bool) $data['ssl_bridging'] : null,
            isset($data['ignore_ssl_server_verify']) ? (bool) $data['ignore_ssl_server_verify'] : null,
            isset($data['redispatch_attempt_count']) && \is_numeric($data['redispatch_attempt_count']) ? (int) $data['redispatch_attempt_count'] : null,
            isset($data['max_retries']) && \is_numeric($data['max_retries']) ? (int) $data['max_retries'] : null,
            isset($data['max_connections']) && \is_numeric($data['max_connections']) ? (int) $data['max_connections'] : null,
            isset($data['timeout_queue']) && \is_scalar($data['timeout_queue']) ? (string) $data['timeout_queue'] : null,
            $data,
        );
    }
}
