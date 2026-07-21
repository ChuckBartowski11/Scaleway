<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AuditTrail;

final readonly class Event
{
    public function __construct(
        public ?string $id = null,
        public ?string $recordedAt = null,
        public ?string $locality = null,
        public ?array $principal = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $sourceIp = null,
        public ?string $userAgent = null,
        public ?string $productName = null,
        public ?string $serviceName = null,
        public ?string $methodName = null,
        public array $resources = [],
        public ?string $requestId = null,
        public ?array $requestBody = null,
        public ?int $statusCode = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['recorded_at']) && \is_scalar($data['recorded_at']) ? (string) $data['recorded_at'] : null,
            isset($data['locality']) && \is_scalar($data['locality']) ? (string) $data['locality'] : null,
            \is_array($data['principal'] ?? null) ? $data['principal'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['source_ip']) && \is_scalar($data['source_ip']) ? (string) $data['source_ip'] : null,
            isset($data['user_agent']) && \is_scalar($data['user_agent']) ? (string) $data['user_agent'] : null,
            isset($data['product_name']) && \is_scalar($data['product_name']) ? (string) $data['product_name'] : null,
            isset($data['service_name']) && \is_scalar($data['service_name']) ? (string) $data['service_name'] : null,
            isset($data['method_name']) && \is_scalar($data['method_name']) ? (string) $data['method_name'] : null,
            \is_array($data['resources'] ?? null) ? $data['resources'] : [],
            isset($data['request_id']) && \is_scalar($data['request_id']) ? (string) $data['request_id'] : null,
            \is_array($data['request_body'] ?? null) ? $data['request_body'] : null,
            isset($data['status_code']) && \is_numeric($data['status_code']) ? (int) $data['status_code'] : null,
            $data,
        );
    }
}
