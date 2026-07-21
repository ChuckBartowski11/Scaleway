<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Ip
{
    public function __construct(
        public ?string $id = null,
        public ?string $ipAddress = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $lbId = null,
        public ?string $reverse = null,
        public array $tags = [],
        public ?string $region = null,
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['ip_address']) && \is_scalar($data['ip_address']) ? (string) $data['ip_address'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['lb_id']) && \is_scalar($data['lb_id']) ? (string) $data['lb_id'] : null,
            isset($data['reverse']) && \is_scalar($data['reverse']) ? (string) $data['reverse'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
