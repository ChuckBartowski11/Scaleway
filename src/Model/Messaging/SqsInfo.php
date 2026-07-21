<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Messaging;

final readonly class SqsInfo
{
    public function __construct(
        public ?string $projectId = null,
        public ?string $region = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $status = null,
        public ?string $sqsEndpointUrl = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['sqs_endpoint_url']) && \is_scalar($data['sqs_endpoint_url']) ? (string) $data['sqs_endpoint_url'] : null,
            $data,
        );
    }
}
