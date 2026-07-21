<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Rule
{
    public function __construct(
        public ?string $id = null,
        public array $permissionSetNames = [],
        public ?string $permissionSetsScopeType = null,
        public ?string $condition = null,
        public array $projectIds = [],
        public ?string $organizationId = null,
        public ?string $accountRootUserId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            \is_array($data['permission_set_names'] ?? null) ? $data['permission_set_names'] : [],
            isset($data['permission_sets_scope_type']) && \is_scalar($data['permission_sets_scope_type']) ? (string) $data['permission_sets_scope_type'] : null,
            isset($data['condition']) && \is_scalar($data['condition']) ? (string) $data['condition'] : null,
            \is_array($data['project_ids'] ?? null) ? $data['project_ids'] : [],
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['account_root_user_id']) && \is_scalar($data['account_root_user_id']) ? (string) $data['account_root_user_id'] : null,
            $data,
        );
    }
}
