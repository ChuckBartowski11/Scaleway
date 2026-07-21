<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\TransactionalEmail;

final readonly class Email
{
    public function __construct(
        public ?string $id = null,
        public ?string $messageId = null,
        public ?string $projectId = null,
        public ?string $mailFrom = null,
        public ?string $rcptTo = null,
        public ?string $mailRcpt = null,
        public ?string $rcptType = null,
        public ?string $subject = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public ?string $status = null,
        public ?string $statusDetails = null,
        public ?int $tryCount = null,
        public array $lastTries = [],
        public array $flags = [],
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['message_id']) && \is_scalar($data['message_id']) ? (string) $data['message_id'] : null,
            isset($data['project_id']) && \is_scalar($data['project_id']) ? (string) $data['project_id'] : null,
            isset($data['mail_from']) && \is_scalar($data['mail_from']) ? (string) $data['mail_from'] : null,
            isset($data['rcpt_to']) && \is_scalar($data['rcpt_to']) ? (string) $data['rcpt_to'] : null,
            isset($data['mail_rcpt']) && \is_scalar($data['mail_rcpt']) ? (string) $data['mail_rcpt'] : null,
            isset($data['rcpt_type']) && \is_scalar($data['rcpt_type']) ? (string) $data['rcpt_type'] : null,
            isset($data['subject']) && \is_scalar($data['subject']) ? (string) $data['subject'] : null,
            isset($data['created_at']) && \is_scalar($data['created_at']) ? (string) $data['created_at'] : null,
            isset($data['updated_at']) && \is_scalar($data['updated_at']) ? (string) $data['updated_at'] : null,
            isset($data['status']) && \is_scalar($data['status']) ? (string) $data['status'] : null,
            isset($data['status_details']) && \is_scalar($data['status_details']) ? (string) $data['status_details'] : null,
            isset($data['try_count']) && \is_numeric($data['try_count']) ? (int) $data['try_count'] : null,
            \is_array($data['last_tries'] ?? null) ? $data['last_tries'] : [],
            \is_array($data['flags'] ?? null) ? $data['flags'] : [],
            $data,
        );
    }
}
