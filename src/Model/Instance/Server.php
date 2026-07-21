<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Server
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $organization = null,
        public ?string $project = null,
        public array $allowedActions = [],
        public array $tags = [],
        public ?string $commercialType = null,
        public ?string $creationDate = null,
        public ?bool $dynamicIpRequired = null,
        public ?bool $routedIpEnabled = null,
        public ?bool $enableIpv6 = null,
        public ?string $hostname = null,
        public ?array $image = null,
        public ?bool $protected = null,
        public ?string $privateIp = null,
        public ?array $publicIp = null,
        public array $publicIps = [],
        public ?string $macAddress = null,
        public ?string $modificationDate = null,
        public ?string $state = null,
        public ?array $location = null,
        public ?array $ipv6 = null,
        public ?string $bootType = null,
        public ?array $volumes = null,
        public ?array $securityGroup = null,
        public array $maintenances = [],
        public ?string $stateDetail = null,
        public ?string $arch = null,
        public ?array $placementGroup = null,
        public array $privateNics = [],
        public ?string $zone = null,
        public ?string $adminPasswordEncryptionSshKeyId = null,
        public ?string $adminPasswordEncryptedValue = null,
        public array $filesystems = [],
        public ?bool $endOfService = null,
        public ?string $dns = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['organization']) && \is_scalar($data['organization']) ? (string) $data['organization'] : null,
            isset($data['project']) && \is_scalar($data['project']) ? (string) $data['project'] : null,
            \is_array($data['allowed_actions'] ?? null) ? $data['allowed_actions'] : [],
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['commercial_type']) && \is_scalar($data['commercial_type']) ? (string) $data['commercial_type'] : null,
            isset($data['creation_date']) && \is_scalar($data['creation_date']) ? (string) $data['creation_date'] : null,
            isset($data['dynamic_ip_required']) ? (bool) $data['dynamic_ip_required'] : null,
            isset($data['routed_ip_enabled']) ? (bool) $data['routed_ip_enabled'] : null,
            isset($data['enable_ipv6']) ? (bool) $data['enable_ipv6'] : null,
            isset($data['hostname']) && \is_scalar($data['hostname']) ? (string) $data['hostname'] : null,
            \is_array($data['image'] ?? null) ? $data['image'] : null,
            isset($data['protected']) ? (bool) $data['protected'] : null,
            isset($data['private_ip']) && \is_scalar($data['private_ip']) ? (string) $data['private_ip'] : null,
            \is_array($data['public_ip'] ?? null) ? $data['public_ip'] : null,
            \is_array($data['public_ips'] ?? null) ? $data['public_ips'] : [],
            isset($data['mac_address']) && \is_scalar($data['mac_address']) ? (string) $data['mac_address'] : null,
            isset($data['modification_date']) && \is_scalar($data['modification_date']) ? (string) $data['modification_date'] : null,
            isset($data['state']) && \is_scalar($data['state']) ? (string) $data['state'] : null,
            \is_array($data['location'] ?? null) ? $data['location'] : null,
            \is_array($data['ipv6'] ?? null) ? $data['ipv6'] : null,
            isset($data['boot_type']) && \is_scalar($data['boot_type']) ? (string) $data['boot_type'] : null,
            \is_array($data['volumes'] ?? null) ? $data['volumes'] : null,
            \is_array($data['security_group'] ?? null) ? $data['security_group'] : null,
            \is_array($data['maintenances'] ?? null) ? $data['maintenances'] : [],
            isset($data['state_detail']) && \is_scalar($data['state_detail']) ? (string) $data['state_detail'] : null,
            isset($data['arch']) && \is_scalar($data['arch']) ? (string) $data['arch'] : null,
            \is_array($data['placement_group'] ?? null) ? $data['placement_group'] : null,
            \is_array($data['private_nics'] ?? null) ? $data['private_nics'] : [],
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['admin_password_encryption_ssh_key_id']) && \is_scalar($data['admin_password_encryption_ssh_key_id']) ? (string) $data['admin_password_encryption_ssh_key_id'] : null,
            isset($data['admin_password_encrypted_value']) && \is_scalar($data['admin_password_encrypted_value']) ? (string) $data['admin_password_encrypted_value'] : null,
            \is_array($data['filesystems'] ?? null) ? $data['filesystems'] : [],
            isset($data['end_of_service']) ? (bool) $data['end_of_service'] : null,
            isset($data['dns']) && \is_scalar($data['dns']) ? (string) $data['dns'] : null,
            $data,
        );
    }
}
