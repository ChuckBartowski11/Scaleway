<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Account;

final readonly class ProjectQualification
{
    public function __construct(
        public ?string $projectId = null,
        public ?array $qualification = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            \is_array($data['qualification'] ?? null) ? $data['qualification'] : null,
            $data,
        );
    }
}
