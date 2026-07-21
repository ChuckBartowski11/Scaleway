<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class PlacementGroup
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organization = null,
        public ?string $project = null,
        public array $tags = [],
        public ?string $policyMode = null,
        public ?string $policyType = null,
        public ?bool $policyRespected = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['policy_mode']) && \is_scalar($data['policy_mode']) ? (string) $data['policy_mode'] : null,
            isset($data['policy_type']) && \is_scalar($data['policy_type']) ? (string) $data['policy_type'] : null,
            isset($data['policy_respected']) ? (bool) $data['policy_respected'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
