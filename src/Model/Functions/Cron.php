<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Functions;

final readonly class Cron
{
    public function __construct(
        public ?string $id = null,
        public ?string $functionId = null,
        public ?string $schedule = null,
        public ?array $args = null,
        public ?string $status = null,
        public ?string $name = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['function_id']) && \is_scalar($data['function_id']) ? (string) $data['function_id'] : null,
            isset($data['schedule']) && \is_scalar($data['schedule']) ? (string) $data['schedule'] : null,
            \is_array($data['args'] ?? null) ? $data['args'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            $data,
        );
    }
}
