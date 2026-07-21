<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class RuleSpecs
{
    public function __construct(
        public array $permissionSetNames = [],
        public ?string $condition = null,
        public array $projectIds = [],
        public ?string $organizationId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['permission_set_names'] ?? null) ? $data['permission_set_names'] : [],
            isset($data['condition']) && \is_scalar($data['condition']) ? (string) $data['condition'] : null,
            \is_array($data['project_ids'] ?? null) ? $data['project_ids'] : [],
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            $data,
        );
    }
}
