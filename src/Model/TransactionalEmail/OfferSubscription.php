<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class OfferSubscription
{
    public function __construct(
        public ?string $organizationId = null,
        public ?string $projectId = null,
        public ?string $offerName = null,
        public ?string $subscribedAt = null,
        public ?string $cancellationAvailableAt = null,
        public ?float $sla = null,
        public ?int $maxDomains = null,
        public ?int $maxDedicatedIps = null,
        public ?int $maxWebhooksPerDomain = null,
        public ?int $maxCustomBlocklistsPerDomain = null,
        public ?int $includedMonthlyEmails = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['organization_id']) && \is_scalar($data['organization_id']) ? (string) $data['organization_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['offer_name']) && \is_scalar($data['offer_name']) ? (string) $data['offer_name'] : null,
            isset($data['subscribed_at']) && \is_scalar($data['subscribed_at']) ? (string) $data['subscribed_at'] : null,
            isset($data['cancellation_available_at']) && \is_scalar($data['cancellation_available_at']) ? (string) $data['cancellation_available_at'] : null,
            isset($data['sla']) && \is_numeric($data['sla']) ? (float) $data['sla'] : null,
            isset($data['max_domains']) && \is_numeric($data['max_domains']) ? (int) $data['max_domains'] : null,
            isset($data['max_dedicated_ips']) && \is_numeric($data['max_dedicated_ips']) ? (int) $data['max_dedicated_ips'] : null,
            isset($data['max_webhooks_per_domain']) && \is_numeric($data['max_webhooks_per_domain']) ? (int) $data['max_webhooks_per_domain'] : null,
            isset($data['max_custom_blocklists_per_domain']) && \is_numeric($data['max_custom_blocklists_per_domain']) ? (int) $data['max_custom_blocklists_per_domain'] : null,
            isset($data['included_monthly_emails']) && \is_numeric($data['included_monthly_emails']) ? (int) $data['included_monthly_emails'] : null,
            $data,
        );
    }
}
