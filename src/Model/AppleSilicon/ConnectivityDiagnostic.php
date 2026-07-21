<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AppleSilicon;

final readonly class ConnectivityDiagnostic
{
    public function __construct(
        public ?string $id = null,
        public mixed $status = null,
        public ?bool $isHealthy = null,
        public mixed $healthDetails = null,
        public array $supportedActions = [],
        public ?string $errorMessage = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            $data['status'] ?? null,
            isset($data['is_healthy']) ? (bool) $data['is_healthy'] : null,
            $data['health_details'] ?? null,
            \is_array($data['supported_actions'] ?? null) ? $data['supported_actions'] : [],
            isset($data['error_message']) && \is_scalar($data['error_message']) ? (string) $data['error_message'] : null,
            $data,
        );
    }
}
