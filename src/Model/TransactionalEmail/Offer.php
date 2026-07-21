<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Offer
{
    public function __construct(
        public ?string $name = null,
        public ?string $createdAt = null,
        public ?string $commitmentPeriod = null,
        public ?float $sla = null,
        public ?int $maxDomains = null,
        public ?int $maxDedicatedIps = null,
        public ?int $includedMonthlyEmails = null,
        public ?int $maxWebhooksPerDomain = null,
        public ?int $maxCustomBlocklistsPerDomain = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['commitment_period']) && \is_scalar($data['commitment_period']) ? (string) $data['commitment_period'] : null,
            isset($data['sla']) && \is_numeric($data['sla']) ? (float) $data['sla'] : null,
            isset($data['max_domains']) && \is_numeric($data['max_domains']) ? (int) $data['max_domains'] : null,
            isset($data['max_dedicated_ips']) && \is_numeric($data['max_dedicated_ips']) ? (int) $data['max_dedicated_ips'] : null,
            isset($data['included_monthly_emails']) && \is_numeric($data['included_monthly_emails']) ? (int) $data['included_monthly_emails'] : null,
            isset($data['max_webhooks_per_domain']) && \is_numeric($data['max_webhooks_per_domain']) ? (int) $data['max_webhooks_per_domain'] : null,
            isset($data['max_custom_blocklists_per_domain']) && \is_numeric($data['max_custom_blocklists_per_domain']) ? (int) $data['max_custom_blocklists_per_domain'] : null,
            $data,
        );
    }
}
