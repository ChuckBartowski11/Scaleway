<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class ClusterType
{
    public function __construct(
        public ?string $name = null,
        public ?string $availability = null,
        public ?int $maxNodes = null,
        public ?string $commitmentDelay = null,
        public ?float $sla = null,
        public ?string $resiliency = null,
        public ?int $memory = null,
        public ?bool $dedicated = null,
        public ?bool $auditLogsSupported = null,
        public ?string $region = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['availability']) && \is_scalar($data['availability']) ? (string) $data['availability'] : null,
            isset($data['max_nodes']) && \is_numeric($data['max_nodes']) ? (int) $data['max_nodes'] : null,
            isset($data['commitment_delay']) && \is_scalar($data['commitment_delay']) ? (string) $data['commitment_delay'] : null,
            isset($data['sla']) && \is_numeric($data['sla']) ? (float) $data['sla'] : null,
            isset($data['resiliency']) && \is_scalar($data['resiliency']) ? (string) $data['resiliency'] : null,
            isset($data['memory']) && \is_numeric($data['memory']) ? (int) $data['memory'] : null,
            isset($data['dedicated']) ? (bool) $data['dedicated'] : null,
            isset($data['audit_logs_supported']) ? (bool) $data['audit_logs_supported'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            $data,
        );
    }
}
