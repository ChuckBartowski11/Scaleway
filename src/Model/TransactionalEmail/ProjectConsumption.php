<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class ProjectConsumption
{
    public function __construct(
        public ?string $projectId = null,
        public ?int $domainsCount = null,
        public ?int $dedicatedIpsCount = null,
        public ?int $monthlyEmailsCount = null,
        public ?int $webhooksCount = null,
        public ?int $customBlocklistsCount = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['domains_count']) && \is_numeric($data['domains_count']) ? (int) $data['domains_count'] : null,
            isset($data['dedicated_ips_count']) && \is_numeric($data['dedicated_ips_count']) ? (int) $data['dedicated_ips_count'] : null,
            isset($data['monthly_emails_count']) && \is_numeric($data['monthly_emails_count']) ? (int) $data['monthly_emails_count'] : null,
            isset($data['webhooks_count']) && \is_numeric($data['webhooks_count']) ? (int) $data['webhooks_count'] : null,
            isset($data['custom_blocklists_count']) && \is_numeric($data['custom_blocklists_count']) ? (int) $data['custom_blocklists_count'] : null,
            $data,
        );
    }
}
