<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class OrganizationSecuritySettings
{
    public function __construct(
        public ?bool $enforcePasswordRenewal = null,
        public ?string $gracePeriodDuration = null,
        public ?int $loginAttemptsBeforeLocked = null,
        public ?string $maxLoginSessionDuration = null,
        public ?string $maxApiKeyExpirationDuration = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['enforce_password_renewal']) ? (bool) $data['enforce_password_renewal'] : null,
            isset($data['grace_period_duration']) && \is_scalar($data['grace_period_duration']) ? (string) $data['grace_period_duration'] : null,
            isset($data['login_attempts_before_locked']) && \is_numeric($data['login_attempts_before_locked']) ? (int) $data['login_attempts_before_locked'] : null,
            isset($data['max_login_session_duration']) && \is_scalar($data['max_login_session_duration']) ? (string) $data['max_login_session_duration'] : null,
            isset($data['max_api_key_expiration_duration']) && \is_scalar($data['max_api_key_expiration_duration']) ? (string) $data['max_api_key_expiration_duration'] : null,
            $data,
        );
    }
}
