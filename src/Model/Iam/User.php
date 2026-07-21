<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class User
{
    public function __construct(
        public ?string $id = null,
        public ?string $email = null,
        public ?string $username = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $phoneNumber = null,
        public ?string $locale = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $organizationId = null,
        public ?bool $deletable = null,
        public ?string $lastLoginAt = null,
        public ?string $type = null,
        public ?bool $twoFactorEnabled = null,
        public ?string $status = null,
        public ?bool $mfa = null,
        public ?string $accountRootUserId = null,
        public array $tags = [],
        public ?bool $locked = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['email']) && \is_scalar($data['email']) ? (string) $data['email'] : null,
            isset($data['username']) && \is_scalar($data['username']) ? (string) $data['username'] : null,
            isset($data['first_name']) && \is_scalar($data['first_name']) ? (string) $data['first_name'] : null,
            isset($data['last_name']) && \is_scalar($data['last_name']) ? (string) $data['last_name'] : null,
            isset($data['phone_number']) && \is_scalar($data['phone_number']) ? (string) $data['phone_number'] : null,
            isset($data['locale']) && \is_scalar($data['locale']) ? (string) $data['locale'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['deletable']) ? (bool) $data['deletable'] : null,
            isset($data['last_login_at']) && \is_scalar($data['last_login_at']) ? (string) $data['last_login_at'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['two_factor_enabled']) ? (bool) $data['two_factor_enabled'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['mfa']) ? (bool) $data['mfa'] : null,
            isset($data['account_root_user_id']) && \is_scalar($data['account_root_user_id']) ? (string) $data['account_root_user_id'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['locked']) ? (bool) $data['locked'] : null,
            $data,
        );
    }
}
