<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iot;

final readonly class TwinDocument
{
    public function __construct(
        public ?string $twinId = null,
        public ?string $documentName = null,
        public ?int $version = null,
        public ?array $data = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['twin_id']) && \is_scalar($data['twin_id']) ? (string) $data['twin_id'] : null,
            isset($data['document_name']) && \is_scalar($data['document_name']) ? (string) $data['document_name'] : null,
            isset($data['version']) && \is_numeric($data['version']) ? (int) $data['version'] : null,
            \is_array($data['data'] ?? null) ? $data['data'] : null,
            $data,
        );
    }
}
