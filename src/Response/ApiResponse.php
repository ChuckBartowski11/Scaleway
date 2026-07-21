<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Response;

use ChuckBartowski\ScalewaySdk\Exception\ApiException;

final readonly class ApiResponse
{
    public function __construct(
        public bool $success,
        public int $statusCode,
        public mixed $data,
        public array $errors,
        public mixed $raw,
    ) {
    }

    public static function fromHttp(int $statusCode, mixed $payload): self
    {
        $success = $statusCode >= 200 && $statusCode < 300;
        $errors = [];

        if (!$success) {
            if (\is_array($payload) && isset($payload['message'])) {
                $type = $payload['type'] ?? null;
                $errors[] = null !== $type
                    ? sprintf('%s: %s', $type, $payload['message'])
                    : (string) $payload['message'];

                foreach ((array) ($payload['details'] ?? []) as $detail) {
                    if (\is_array($detail) && isset($detail['argument_name'], $detail['help_message'])) {
                        $errors[] = sprintf('%s: %s', $detail['argument_name'], $detail['help_message']);
                    }
                }
            } else {
                $errors = [sprintf('HTTP %d', $statusCode)];
            }
        }

        return new self($success, $statusCode, $payload, $errors, $payload);
    }

    public function ensureSuccess(): self
    {
        if (!$this->success) {
            throw new ApiException($this->errors ?: ['Scaleway API call failed'], $this->statusCode, $this->raw);
        }

        return $this;
    }

    public function data(?string $key = null, mixed $default = null): mixed
    {
        if (null === $key) {
            return $this->data;
        }

        return \is_array($this->data) ? ($this->data[$key] ?? $default) : $default;
    }
}
