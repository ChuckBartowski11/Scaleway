<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\WebHosting;

final readonly class ResourceSummary
{
    public function __construct(
        public ?int $databasesCount = null,
        public ?int $mailAccountsCount = null,
        public ?int $ftpAccountsCount = null,
        public ?int $websitesCount = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['databases_count']) && \is_numeric($data['databases_count']) ? (int) $data['databases_count'] : null,
            isset($data['mail_accounts_count']) && \is_numeric($data['mail_accounts_count']) ? (int) $data['mail_accounts_count'] : null,
            isset($data['ftp_accounts_count']) && \is_numeric($data['ftp_accounts_count']) ? (int) $data['ftp_accounts_count'] : null,
            isset($data['websites_count']) && \is_numeric($data['websites_count']) ? (int) $data['websites_count'] : null,
            $data,
        );
    }
}
