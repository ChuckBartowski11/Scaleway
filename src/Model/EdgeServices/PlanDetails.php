<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class PlanDetails
{
    public function __construct(
        public ?string $planName = null,
        public ?int $packageGb = null,
        public ?int $pipelineLimit = null,
        public ?int $wafRequests = null,
        public ?int $backendLimit = null,
        public ?bool $wildcardDomain = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['plan_name']) && \is_scalar($data['plan_name']) ? (string) $data['plan_name'] : null,
            isset($data['package_gb']) && \is_numeric($data['package_gb']) ? (int) $data['package_gb'] : null,
            isset($data['pipeline_limit']) && \is_numeric($data['pipeline_limit']) ? (int) $data['pipeline_limit'] : null,
            isset($data['waf_requests']) && \is_numeric($data['waf_requests']) ? (int) $data['waf_requests'] : null,
            isset($data['backend_limit']) && \is_numeric($data['backend_limit']) ? (int) $data['backend_limit'] : null,
            isset($data['wildcard_domain']) ? (bool) $data['wildcard_domain'] : null,
            $data,
        );
    }
}
