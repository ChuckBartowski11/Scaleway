<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Exception;

final class RateLimitException extends ApiException
{
    public function __construct(
        array $errors,
        int $statusCode = 429,
        mixed $raw = null,
        private readonly ?int $retryAfter = null,
    ) {
        parent::__construct($errors, $statusCode, $raw);
    }

    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }
}
