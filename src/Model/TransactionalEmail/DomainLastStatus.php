<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class DomainLastStatus
{
    public function __construct(
        public ?string $domainId = null,
        public ?string $domainName = null,
        public ?array $spfRecord = null,
        public ?array $dkimRecord = null,
        public ?array $dmarcRecord = null,
        public ?array $mxRecord = null,
        public ?array $autoconfigState = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['domain_id']) && \is_scalar($data['domain_id']) ? (string) $data['domain_id'] : null,
            isset($data['domain_name']) && \is_scalar($data['domain_name']) ? (string) $data['domain_name'] : null,
            \is_array($data['spf_record'] ?? null) ? $data['spf_record'] : null,
            \is_array($data['dkim_record'] ?? null) ? $data['dkim_record'] : null,
            \is_array($data['dmarc_record'] ?? null) ? $data['dmarc_record'] : null,
            \is_array($data['mx_record'] ?? null) ? $data['mx_record'] : null,
            \is_array($data['autoconfig_state'] ?? null) ? $data['autoconfig_state'] : null,
            $data,
        );
    }
}
