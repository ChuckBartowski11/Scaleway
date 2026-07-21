<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Saml
{
    public function __construct(
        public ?string $id = null,
        public ?string $status = null,
        public ?array $serviceProvider = null,
        public ?string $entityId = null,
        public ?string $singleSignOnUrl = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            \is_array($data['service_provider'] ?? null) ? $data['service_provider'] : null,
            isset($data['entity_id']) && \is_scalar($data['entity_id']) ? (string) $data['entity_id'] : null,
            isset($data['single_sign_on_url']) && \is_scalar($data['single_sign_on_url']) ? (string) $data['single_sign_on_url'] : null,
            $data,
        );
    }
}
