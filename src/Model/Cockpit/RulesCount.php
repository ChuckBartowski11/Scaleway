<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class RulesCount
{
    public function __construct(
        public ?string $dataSourceId = null,
        public ?string $dataSourceName = null,
        public ?int $rulesCount = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['data_source_id']) && \is_scalar($data['data_source_id']) ? (string) $data['data_source_id'] : null,
            isset($data['data_source_name']) && \is_scalar($data['data_source_name']) ? (string) $data['data_source_name'] : null,
            isset($data['rules_count']) && \is_numeric($data['rules_count']) ? (int) $data['rules_count'] : null,
            $data,
        );
    }
}
