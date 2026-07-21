<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class HealthCheck
{
    public function __construct(
        public ?int $port = null,
        public ?float $checkDelay = null,
        public ?float $checkTimeout = null,
        public ?int $checkMaxRetries = null,
        public ?array $tcpConfig = null,
        public ?array $mysqlConfig = null,
        public ?array $pgsqlConfig = null,
        public ?array $ldapConfig = null,
        public ?array $redisConfig = null,
        public ?array $httpConfig = null,
        public ?array $httpsConfig = null,
        public ?bool $checkSendProxy = null,
        public ?string $transientCheckDelay = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['port']) && \is_numeric($data['port']) ? (int) $data['port'] : null,
            isset($data['check_delay']) && \is_numeric($data['check_delay']) ? (float) $data['check_delay'] : null,
            isset($data['check_timeout']) && \is_numeric($data['check_timeout']) ? (float) $data['check_timeout'] : null,
            isset($data['check_max_retries']) && \is_numeric($data['check_max_retries']) ? (int) $data['check_max_retries'] : null,
            \is_array($data['tcp_config'] ?? null) ? $data['tcp_config'] : null,
            \is_array($data['mysql_config'] ?? null) ? $data['mysql_config'] : null,
            \is_array($data['pgsql_config'] ?? null) ? $data['pgsql_config'] : null,
            \is_array($data['ldap_config'] ?? null) ? $data['ldap_config'] : null,
            \is_array($data['redis_config'] ?? null) ? $data['redis_config'] : null,
            \is_array($data['http_config'] ?? null) ? $data['http_config'] : null,
            \is_array($data['https_config'] ?? null) ? $data['https_config'] : null,
            isset($data['check_send_proxy']) ? (bool) $data['check_send_proxy'] : null,
            isset($data['transient_check_delay']) && \is_scalar($data['transient_check_delay']) ? (string) $data['transient_check_delay'] : null,
            $data,
        );
    }
}
