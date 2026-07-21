<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class RouteRule
{
    public function __construct(
        public ?array $ruleHttpMatch = null,
        public ?string $backendStageId = null,
        public ?int $position = null,
        public ?string $routeStageId = null,
        public ?string $wafStageId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['rule_http_match'] ?? null) ? $data['rule_http_match'] : null,
            isset($data['backend_stage_id']) && \is_scalar($data['backend_stage_id']) ? (string) $data['backend_stage_id'] : null,
            isset($data['position']) && \is_numeric($data['position']) ? (int) $data['position'] : null,
            isset($data['route_stage_id']) && \is_scalar($data['route_stage_id']) ? (string) $data['route_stage_id'] : null,
            isset($data['waf_stage_id']) && \is_scalar($data['waf_stage_id']) ? (string) $data['waf_stage_id'] : null,
            $data,
        );
    }
}
