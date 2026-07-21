<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class TransactionalEmailApi extends AbstractApi
{
    private const PRODUCT = 'tem';
    private const VERSION = 'v1alpha1';

    public function domains(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/domains', $region), $query);
    }

    public function domain(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/domains/'.$id, $region));
    }

    public function createDomain(string $domainName, bool $acceptTos = true, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/domains', $region), $this->withProject([
            'domain_name' => $domainName,
            'accept_tos' => $acceptTos,
        ], 'project_id'));
    }

    public function checkDomain(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/domains/%s/check', $id), $region));
    }

    public function revokeDomain(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/domains/%s/revoke', $id), $region));
    }

    public function emails(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/emails', $region), $query);
    }

    public function email(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/emails/'.$id, $region));
    }

    public function sendEmail(string $fromEmail, array $to, string $subject, string $text, string $html = '', array $options = [], ?string $region = null): ApiResponse
    {
        $recipients = array_map(
            static fn (string $address): array => ['email' => $address],
            array_values($to),
        );

        return $this->post($this->path('/emails', $region), $this->withProject(array_merge($options, array_filter([
            'from' => ['email' => $fromEmail],
            'to' => $recipients,
            'subject' => $subject,
            'text' => $text,
            'html' => '' !== $html ? $html : null,
        ], static fn (mixed $v): bool => null !== $v)), 'project_id'));
    }

    public function cancelEmail(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/emails/%s/cancel', $id), $region));
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
