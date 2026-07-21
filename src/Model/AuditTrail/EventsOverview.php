<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class EventsOverview
{
    public function __construct(
        public array $lastEvents = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            \is_array($data['last_events'] ?? null) ? $data['last_events'] : [],
            $data,
        );
    }
}
