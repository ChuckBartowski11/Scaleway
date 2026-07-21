<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Quotum
{
    public function __construct(
        public ?string $name = null,
        public ?int $limit = null,
        public ?bool $unlimited = null,
        public ?string $prettyName = null,
        public ?string $unit = null,
        public ?string $description = null,
        public ?string $localityType = null,
        public array $limits = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['limit']) && \is_numeric($data['limit']) ? (int) $data['limit'] : null,
            isset($data['unlimited']) ? (bool) $data['unlimited'] : null,
            isset($data['pretty_name']) && \is_scalar($data['pretty_name']) ? (string) $data['pretty_name'] : null,
            isset($data['unit']) && \is_scalar($data['unit']) ? (string) $data['unit'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['locality_type']) && \is_scalar($data['locality_type']) ? (string) $data['locality_type'] : null,
            \is_array($data['limits'] ?? null) ? $data['limits'] : [],
            $data,
        );
    }
}
