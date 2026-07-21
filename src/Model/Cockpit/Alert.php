<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class Alert
{
    public function __construct(
        public ?string $region = null,
        public ?bool $preconfigured = null,
        public ?string $name = null,
        public ?string $rule = null,
        public ?string $duration = null,
        public ?string $ruleStatus = null,
        public ?string $state = null,
        public ?array $annotations = null,
        public ?array $preconfiguredData = null,
        public ?string $dataSourceId = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['preconfigured']) ? (bool) $data['preconfigured'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['rule']) && \is_scalar($data['rule']) ? (string) $data['rule'] : null,
            isset($data['duration']) && \is_scalar($data['duration']) ? (string) $data['duration'] : null,
            isset($data['rule_status']) && \is_scalar($data['rule_status']) ? (string) $data['rule_status'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            \is_array($data['annotations'] ?? null) ? $data['annotations'] : null,
            \is_array($data['preconfigured_data'] ?? null) ? $data['preconfigured_data'] : null,
            isset($data['data_source_id']) && \is_scalar($data['data_source_id']) ? (string) $data['data_source_id'] : null,
            $data,
        );
    }
}
