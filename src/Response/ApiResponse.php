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
        public array $headers = [],
    ) {
    }

    public static function fromHttp(int $statusCode, mixed $payload, array $headers = []): self
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

        return new self($success, $statusCode, $payload, $errors, $payload, $headers);
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

    public function items(?string $key = null): array
    {
        if (null !== $key) {
            $items = $this->data($key, []);

            return \is_array($items) ? $items : [];
        }

        if (!\is_array($this->data)) {
            return [];
        }

        if (array_is_list($this->data)) {
            return $this->data;
        }

        foreach ($this->data as $field => $value) {
            if ('total_count' !== $field && \is_array($value) && array_is_list($value)) {
                return $value;
            }
        }

        return [];
    }

    public function first(?string $key = null): mixed
    {
        return $this->items($key)[0] ?? null;
    }

    public function totalCount(): ?int
    {
        $count = $this->data('total_count');

        if (null !== $count) {
            return (int) $count;
        }

        $header = $this->header('x-total-count');

        return null !== $header ? (int) $header : null;
    }

    public function header(string $name): ?string
    {
        $values = $this->headers[strtolower($name)] ?? null;

        return \is_array($values) ? ($values[0] ?? null) : null;
    }
}
