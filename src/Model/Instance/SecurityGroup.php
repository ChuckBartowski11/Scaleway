<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class SecurityGroup
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $enableDefaultSecurity = null,
        public ?string $inboundDefaultPolicy = null,
        public ?string $outboundDefaultPolicy = null,
        public ?string $organization = null,
        public ?string $project = null,
        public array $tags = [],
        public ?bool $organizationDefault = null,
        public ?bool $projectDefault = null,
        public ?string $creationDate = null,
        public ?string $modificationDate = null,
        public array $servers = [],
        public ?bool $stateful = null,
        public ?string $state = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['enable_default_security']) ? (bool) $data['enable_default_security'] : null,
            isset($data['inbound_default_policy']) && \is_scalar($data['inbound_default_policy']) ? (string) $data['inbound_default_policy'] : null,
            isset($data['outbound_default_policy']) && \is_scalar($data['outbound_default_policy']) ? (string) $data['outbound_default_policy'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['organization_default']) ? (bool) $data['organization_default'] : null,
            isset($data['project_default']) ? (bool) $data['project_default'] : null,
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['modification_date']) && \is_scalar($data['modification_date']) ? (string) $data['modification_date'] : null,
            \is_array($data['servers'] ?? null) ? $data['servers'] : [],
            isset($data['stateful']) ? (bool) $data['stateful'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
