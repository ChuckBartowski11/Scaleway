<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Instance;

final readonly class Dashboard
{
    public function __construct(
        public ?int $volumesCount = null,
        public ?int $runningServersCount = null,
        public ?array $serversByTypes = null,
        public ?int $imagesCount = null,
        public ?int $snapshotsCount = null,
        public ?int $serversCount = null,
        public ?int $ipsCount = null,
        public ?int $securityGroupsCount = null,
        public ?int $ipsUnused = null,
        public ?int $volumesLSsdCount = null,
        public ?int $volumesLSsdTotalSize = null,
        public ?int $privateNicsCount = null,
        public ?int $placementGroupsCount = null,
        public ?int $volumesScratchCount = null,
        public ?int $volumesBSsdCount = null,
        public ?int $volumesBSsdTotalSize = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['volumes_count']) && \is_numeric($data['volumes_count']) ? (int) $data['volumes_count'] : null,
            isset($data['running_servers_count']) && \is_numeric($data['running_servers_count']) ? (int) $data['running_servers_count'] : null,
            \is_array($data['servers_by_types'] ?? null) ? $data['servers_by_types'] : null,
            isset($data['images_count']) && \is_numeric($data['images_count']) ? (int) $data['images_count'] : null,
            isset($data['snapshots_count']) && \is_numeric($data['snapshots_count']) ? (int) $data['snapshots_count'] : null,
            isset($data['servers_count']) && \is_numeric($data['servers_count']) ? (int) $data['servers_count'] : null,
            isset($data['ips_count']) && \is_numeric($data['ips_count']) ? (int) $data['ips_count'] : null,
            isset($data['security_groups_count']) && \is_numeric($data['security_groups_count']) ? (int) $data['security_groups_count'] : null,
            isset($data['ips_unused']) && \is_numeric($data['ips_unused']) ? (int) $data['ips_unused'] : null,
            isset($data['volumes_l_ssd_count']) && \is_numeric($data['volumes_l_ssd_count']) ? (int) $data['volumes_l_ssd_count'] : null,
            isset($data['volumes_l_ssd_total_size']) && \is_numeric($data['volumes_l_ssd_total_size']) ? (int) $data['volumes_l_ssd_total_size'] : null,
            isset($data['private_nics_count']) && \is_numeric($data['private_nics_count']) ? (int) $data['private_nics_count'] : null,
            isset($data['placement_groups_count']) && \is_numeric($data['placement_groups_count']) ? (int) $data['placement_groups_count'] : null,
            isset($data['volumes_scratch_count']) && \is_numeric($data['volumes_scratch_count']) ? (int) $data['volumes_scratch_count'] : null,
            isset($data['volumes_b_ssd_count']) && \is_numeric($data['volumes_b_ssd_count']) ? (int) $data['volumes_b_ssd_count'] : null,
            isset($data['volumes_b_ssd_total_size']) && \is_numeric($data['volumes_b_ssd_total_size']) ? (int) $data['volumes_b_ssd_total_size'] : null,
            $data,
        );
    }
}
