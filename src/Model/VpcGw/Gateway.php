<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\VpcGw;

final readonly class Gateway
{
    public function __construct(
        public ?string $id = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $type = null,
        public ?int $bandwidth = null,
        public ?string $status = null,
        public ?string $name = null,
        public array $tags = [],
        public ?array $ipv4 = null,
        public array $gatewayNetworks = [],
        public ?string $version = null,
        public ?string $canUpgradeTo = null,
        public ?bool $bastionEnabled = null,
        public ?int $bastionPort = null,
        public ?bool $smtpEnabled = null,
        public ?bool $isLegacy = null,
        public array $bastionAllowedIps = [],
        public ?string $zone = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['bandwidth']) && \is_numeric($data['bandwidth']) ? (int) $data['bandwidth'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['ipv4'] ?? null) ? $data['ipv4'] : null,
            \is_array($data['gateway_networks'] ?? null) ? $data['gateway_networks'] : [],
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['can_upgrade_to']) && \is_scalar($data['can_upgrade_to']) ? (string) $data['can_upgrade_to'] : null,
            isset($data['bastion_enabled']) ? (bool) $data['bastion_enabled'] : null,
            isset($data['bastion_port']) && \is_numeric($data['bastion_port']) ? (int) $data['bastion_port'] : null,
            isset($data['smtp_enabled']) ? (bool) $data['smtp_enabled'] : null,
            isset($data['is_legacy']) ? (bool) $data['is_legacy'] : null,
            \is_array($data['bastion_allowed_ips'] ?? null) ? $data['bastion_allowed_ips'] : [],
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            $data,
        );
    }
}
