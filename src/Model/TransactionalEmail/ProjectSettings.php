<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class ProjectSettings
{
    public function __construct(
        public ?array $periodicReport = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['periodic_report'] ?? null) ? $data['periodic_report'] : null,
            $data,
        );
    }
}
