<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\EdgeServices;

final readonly class ScalewayLb
{
    public function __construct(
        public ?string $id = null,
        public ?string $zone = null,
        public ?string $frontendId = null,
        public ?bool $isSsl = null,
        public ?string $domainName = null,
        public ?bool $hasWebsocket = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['frontend_id']) && \is_scalar($data['frontend_id']) ? (string) $data['frontend_id'] : null,
            isset($data['is_ssl']) ? (bool) $data['is_ssl'] : null,
            isset($data['domain_name']) && \is_scalar($data['domain_name']) ? (string) $data['domain_name'] : null,
            isset($data['has_websocket']) ? (bool) $data['has_websocket'] : null,
            $data,
        );
    }
}
