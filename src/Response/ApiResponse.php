<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Response;

use ChuckBartowski\ScalewaySdk\Exception\ApiException;
use ChuckBartowski\ScalewaySdk\Exception\ConflictException;
use ChuckBartowski\ScalewaySdk\Exception\QuotaExceededException;
use ChuckBartowski\ScalewaySdk\Exception\RateLimitException;
use ChuckBartowski\ScalewaySdk\Exception\ResourceNotFoundException;

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
        if ($this->success) {
            return $this;
        }

        $errors = $this->errors ?: ['Scaleway API call failed'];
        $type = \is_array($this->data) ? ($this->data['type'] ?? null) : null;
        $retryAfter = $this->header('retry-after');

        throw match (true) {
            429 === $this->statusCode => new RateLimitException($errors, 429, $this->raw, null !== $retryAfter ? (int) $retryAfter : null),
            404 === $this->statusCode => new ResourceNotFoundException($errors, 404, $this->raw),
            409 === $this->statusCode => new ConflictException($errors, 409, $this->raw),
            'quotas_exceeded' === $type => new QuotaExceededException($errors, $this->statusCode, $this->raw),
            default => new ApiException($errors, $this->statusCode, $this->raw),
        };
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

    public function as(string $model, ?string $key = null): ?object
    {
        $source = null !== $key ? $this->data($key) : $this->objectData();

        return \is_array($source) && !array_is_list($source) ? $model::from($source) : null;
    }

    public function asList(string $model, ?string $key = null): array
    {
        return array_map(
            static fn (array $item): object => $model::from($item),
            array_values(array_filter($this->items($key), 'is_array')),
        );
    }

    private function objectData(): ?array
    {
        if (!\is_array($this->data) || array_is_list($this->data)) {
            return null;
        }

        if (1 === \count($this->data)) {
            $only = $this->data[array_key_first($this->data)];

            if (\is_array($only) && !array_is_list($only)) {
                return $only;
            }
        }

        return $this->data;
    }
}
