<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class Cluster
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $version = null,
        public ?string $region = null,
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public array $tags = [],
        public ?string $cni = null,
        public ?string $description = null,
        public ?string $clusterUrl = null,
        public ?string $dnsWildcard = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?array $autoscalerConfig = null,
        public ?array $autoUpgrade = null,
        public ?bool $upgradeAvailable = null,
        public array $featureGates = [],
        public array $admissionPlugins = [],
        public ?array $openIdConnectConfig = null,
        public array $apiserverCertSans = [],
        public ?string $privateNetworkId = null,
        public ?string $commitmentEndsAt = null,
        public ?bool $aclAvailable = null,
        public ?string $iamNodesGroupId = null,
        public ?string $podCidr = null,
        public ?string $serviceCidr = null,
        public ?string $serviceDnsIp = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['type']) && \is_scalar($data['type']) ? (string) $data['type'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['version']) && \is_scalar($data['version']) ? (string) $data['version'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            \is_array($data['tags'] ?? null) ? $data['tags'] : [],
            isset($data['cni']) && \is_scalar($data['cni']) ? (string) $data['cni'] : null,
            isset($data['description']) && \is_scalar($data['description']) ? (string) $data['description'] : null,
            isset($data['cluster_url']) && \is_scalar($data['cluster_url']) ? (string) $data['cluster_url'] : null,
            isset($data['dns_wildcard']) && \is_scalar($data['dns_wildcard']) ? (string) $data['dns_wildcard'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            \is_array($data['autoscaler_config'] ?? null) ? $data['autoscaler_config'] : null,
            \is_array($data['auto_upgrade'] ?? null) ? $data['auto_upgrade'] : null,
            isset($data['upgrade_available']) ? (bool) $data['upgrade_available'] : null,
            \is_array($data['feature_gates'] ?? null) ? $data['feature_gates'] : [],
            \is_array($data['admission_plugins'] ?? null) ? $data['admission_plugins'] : [],
            \is_array($data['open_id_connect_config'] ?? null) ? $data['open_id_connect_config'] : null,
            \is_array($data['apiserver_cert_sans'] ?? null) ? $data['apiserver_cert_sans'] : [],
            isset($data['private_network_id']) && \is_scalar($data['private_network_id']) ? (string) $data['private_network_id'] : null,
            isset($data['commitment_ends_at']) && \is_scalar($data['commitment_ends_at']) ? (string) $data['commitment_ends_at'] : null,
            isset($data['acl_available']) ? (bool) $data['acl_available'] : null,
            isset($data['iam_nodes_group_id']) && \is_scalar($data['iam_nodes_group_id']) ? (string) $data['iam_nodes_group_id'] : null,
            isset($data['pod_cidr']) && \is_scalar($data['pod_cidr']) ? (string) $data['pod_cidr'] : null,
            isset($data['service_cidr']) && \is_scalar($data['service_cidr']) ? (string) $data['service_cidr'] : null,
            isset($data['service_dns_ip']) && \is_scalar($data['service_dns_ip']) ? (string) $data['service_dns_ip'] : null,
            $data,
        );
    }
}
