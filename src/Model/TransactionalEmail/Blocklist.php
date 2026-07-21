<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Blocklist
{
    public function __construct(
        public ?string $id = null,
        public ?string $domainId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $endsAt = null,
        public ?string $email = null,
        public ?string $type = null,
        public ?string $reason = null,
        public ?bool $custom = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['domain_id']) && \is_scalar($data['domain_id']) ? (string) $data['domain_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['ends_at']) && \is_scalar($data['ends_at']) ? (string) $data['ends_at'] : null,
            isset($data['email']) && \is_scalar($data['email']) ? (string) $data['email'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['reason']) && \is_scalar($data['reason']) ? (string) $data['reason'] : null,
            isset($data['custom']) ? (bool) $data['custom'] : null,
            $data,
        );
    }
}
