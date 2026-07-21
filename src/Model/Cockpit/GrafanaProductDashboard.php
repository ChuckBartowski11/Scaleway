<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Cockpit;

final readonly class GrafanaProductDashboard
{
    public function __construct(
        public ?string $name = null,
        public ?string $title = null,
        public ?string $url = null,
        public array $tags = [],
        public array $variables = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['title']) && \is_scalar($data['title']) ? (string) $data['title'] : null,
            isset($data['url']) && \is_scalar($data['url']) ? (string) $data['url'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['variables'] ?? null) ? $data['variables'] : [],
            $data,
        );
    }
}
