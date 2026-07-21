<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\LoadBalancer;

final readonly class Certificate
{
    public function __construct(
        public ?string $type = null,
        public ?string $id = null,
        public ?string $commonName = null,
        public array $subjectAlternativeName = [],
        public ?string $fingerprint = null,
        public ?string $notValidBefore = null,
        public ?string $notValidAfter = null,
        public ?string $status = null,
        public ?array $lb = null,
        public ?string $name = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $statusDetails = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['common_name']) && \is_scalar($data['common_name']) ? (string) $data['common_name'] : null,
            \is_array($data['subject_alternative_name'] ?? null) ? $data['subject_alternative_name'] : [],
            isset($data['fingerprint']) && \is_scalar($data['fingerprint']) ? (string) $data['fingerprint'] : null,
            isset($data['not_valid_before']) && \is_scalar($data['not_valid_before']) ? (string) $data['not_valid_before'] : null,
            isset($data['not_valid_after']) && \is_scalar($data['not_valid_after']) ? (string) $data['not_valid_after'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['lb'] ?? null) ? $data['lb'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['status_details']) && \is_scalar($data['status_details']) ? (string) $data['status_details'] : null,
            $data,
        );
    }
}
