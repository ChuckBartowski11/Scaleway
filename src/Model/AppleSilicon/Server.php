<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AppleSilicon;

final readonly class Server
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $name = null,
        public ?string $projectId = null,
        public ?string $organizationId = null,
        public ?string $ip = null,
        public ?string $vncUrl = null,
        public ?string $sshUsername = null,
        public ?string $sudoPassword = null,
        public ?int $vncPort = null,
        public ?array $os = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $deletableAt = null,
        public ?bool $deletionScheduled = null,
        public ?string $zone = null,
        public ?bool $delivered = null,
        public ?string $vpcStatus = null,
        public ?array $commitment = null,
        public ?int $publicBandwidthBps = null,
        public ?array $runnerConfiguration = null,
        public array $tags = [],
        public array $appliedRunnerConfigurationIds = [],
        public ?bool $kextEnabled = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['ip']) && \is_scalar($data['ip']) ? (string) $data['ip'] : null,
            isset($data['vnc_url']) && \is_scalar($data['vnc_url']) ? (string) $data['vnc_url'] : null,
            isset($data['ssh_username']) && \is_scalar($data['ssh_username']) ? (string) $data['ssh_username'] : null,
            isset($data['sudo_password']) && \is_scalar($data['sudo_password']) ? (string) $data['sudo_password'] : null,
            isset($data['vnc_port']) && \is_numeric($data['vnc_port']) ? (int) $data['vnc_port'] : null,
            \is_array($data['os'] ?? null) ? $data['os'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['deletable_at']) && \is_scalar($data['deletable_at']) ? (string) $data['deletable_at'] : null,
            isset($data['deletion_scheduled']) ? (bool) $data['deletion_scheduled'] : null,
            isset($data['zone']) && \is_scalar($data['zone']) ? (string) $data['zone'] : null,
            isset($data['delivered']) ? (bool) $data['delivered'] : null,
            isset($data['vpc_status']) && \is_scalar($data['vpc_status']) ? (string) $data['vpc_status'] : null,
            \is_array($data['commitment'] ?? null) ? $data['commitment'] : null,
            isset($data['public_bandwidth_bps']) && \is_numeric($data['public_bandwidth_bps']) ? (int) $data['public_bandwidth_bps'] : null,
            \is_array($data['runner_configuration'] ?? null) ? $data['runner_configuration'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            \is_array($data['applied_runner_configuration_ids'] ?? null) ? $data['applied_runner_configuration_ids'] : [],
            isset($data['kext_enabled']) ? (bool) $data['kext_enabled'] : null,
            $data,
        );
    }
}
