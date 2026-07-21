<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\AppleSilicon;

final readonly class RunnerConfigurationV2
{
    public function __construct(
        public ?string $name = null,
        public mixed $provider = null,
        public ?array $githubConfiguration = null,
        public ?array $gitlabConfiguration = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            $data['provider'] ?? null,
            \is_array($data['github_configuration'] ?? null) ? $data['github_configuration'] : null,
            \is_array($data['gitlab_configuration'] ?? null) ? $data['gitlab_configuration'] : null,
            $data,
        );
    }
}
