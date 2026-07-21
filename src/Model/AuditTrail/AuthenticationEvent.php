<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class AuthenticationEvent
{
    public function __construct(
        public ?string $id = null,
        public ?string $recordedAt = null,
        public ?string $organizationId = null,
        public ?string $sourceIp = null,
        public ?string $userAgent = null,
        public array $resources = [],
        public ?string $result = null,
        public ?string $failureReason = null,
        public ?string $countryCode = null,
        public ?string $method = null,
        public ?string $origin = null,
        public ?string $mfaType = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['recorded_at']) && \is_scalar($data['recorded_at']) ? (string) $data['recorded_at'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['source_ip']) && \is_scalar($data['source_ip']) ? (string) $data['source_ip'] : null,
            isset($data['user_agent']) && \is_scalar($data['user_agent']) ? (string) $data['user_agent'] : null,
            \is_array($data['resources'] ?? null) ? $data['resources'] : [],
            isset($data['result']) && \is_scalar($data['result']) ? (string) $data['result'] : null,
            isset($data['failure_reason']) && \is_scalar($data['failure_reason']) ? (string) $data['failure_reason'] : null,
            isset($data['country_code']) && \is_scalar($data['country_code']) ? (string) $data['country_code'] : null,
            isset($data['method']) && \is_scalar($data['method']) ? (string) $data['method'] : null,
            isset($data['origin']) && \is_scalar($data['origin']) ? (string) $data['origin'] : null,
            isset($data['mfa_type']) && \is_scalar($data['mfa_type']) ? (string) $data['mfa_type'] : null,
            $data,
        );
    }
}
