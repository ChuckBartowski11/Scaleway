<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\K8s;

final readonly class Version
{
    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public ?string $region = null,
        public array $availableCnis = [],
        public array $availableContainerRuntimes = [],
        public array $availableFeatureGates = [],
        public array $availableAdmissionPlugins = [],
        public ?array $availableKubeletArgs = null,
        public ?string $deprecatedAt = null,
        public ?string $endOfLifeAt = null,
        public ?string $releasedAt = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['label']) && \is_scalar($data['label']) ? (string) $data['label'] : null,
            isset($data['region']) && \is_scalar($data['region']) ? (string) $data['region'] : null,
            \is_array($data['available_cnis'] ?? null) ? $data['available_cnis'] : [],
            \is_array($data['available_container_runtimes'] ?? null) ? $data['available_container_runtimes'] : [],
            \is_array($data['available_feature_gates'] ?? null) ? $data['available_feature_gates'] : [],
            \is_array($data['available_admission_plugins'] ?? null) ? $data['available_admission_plugins'] : [],
            \is_array($data['available_kubelet_args'] ?? null) ? $data['available_kubelet_args'] : null,
            isset($data['deprecated_at']) && \is_scalar($data['deprecated_at']) ? (string) $data['deprecated_at'] : null,
            isset($data['end_of_life_at']) && \is_scalar($data['end_of_life_at']) ? (string) $data['end_of_life_at'] : null,
            isset($data['released_at']) && \is_scalar($data['released_at']) ? (string) $data['released_at'] : null,
            $data,
        );
    }
}
