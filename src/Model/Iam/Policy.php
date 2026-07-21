<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Policy
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $organizationId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?bool $editable = null,
        public ?bool $deletable = null,
        public ?bool $managed = null,
        public ?int $nbRules = null,
        public ?int $nbScopes = null,
        public ?int $nbPermissionSets = null,
        public array $tags = [],
        public ?string $userId = null,
        public ?string $groupId = null,
        public ?string $applicationId = null,
        public ?bool $noPrincipal = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['editable']) ? (bool) $data['editable'] : null,
            isset($data['deletable']) ? (bool) $data['deletable'] : null,
            isset($data['managed']) ? (bool) $data['managed'] : null,
            isset($data['nb_rules']) && \is_numeric($data['nb_rules']) ? (int) $data['nb_rules'] : null,
            isset($data['nb_scopes']) && \is_numeric($data['nb_scopes']) ? (int) $data['nb_scopes'] : null,
            isset($data['nb_permission_sets']) && \is_numeric($data['nb_permission_sets']) ? (int) $data['nb_permission_sets'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['user_id']) && \is_scalar($data['user_id']) ? (string) $data['user_id'] : null,
            isset($data['group_id']) && \is_scalar($data['group_id']) ? (string) $data['group_id'] : null,
            isset($data['application_id']) && \is_scalar($data['application_id']) ? (string) $data['application_id'] : null,
            isset($data['no_principal']) ? (bool) $data['no_principal'] : null,
            $data,
        );
    }
}
