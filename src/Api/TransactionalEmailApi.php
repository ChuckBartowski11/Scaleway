<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class TransactionalEmailApi extends AbstractApi
{
    private const PRODUCT = 'transactional-email';
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

    public function domainRecords(string $id, ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/domains/%s/records', $id), $region));
    }

    public function deleteDomain(string $id, ?string $region = null): ApiResponse
    {
        return $this->post($this->path(sprintf('/domains/%s/delete', $id), $region));
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

    public function webhooks(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/webhooks', $region), $query);
    }

    public function createWebhook(string $domainId, string $name, string $snsArn, array $eventTypes, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/webhooks', $region), $this->withProject([
            'domain_id' => $domainId,
            'name' => $name,
            'sns_arn' => $snsArn,
            'event_types' => $eventTypes,
        ], 'project_id'));
    }

    public function updateWebhook(string $id, array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/webhooks/'.$id, $region), $fields);
    }

    public function deleteWebhook(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/webhooks/'.$id, $region));
    }

    public function webhookEvents(string $id, array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path(sprintf('/webhooks/%s/events', $id), $region), $query);
    }

    public function blocklists(array $query = [], ?string $region = null): ApiResponse
    {
        return $this->get($this->path('/blocklists', $region), $query);
    }

    public function createBlocklist(string $domainId, string $email, string $type, ?string $reason = null, ?string $region = null): ApiResponse
    {
        return $this->post($this->path('/blocklists', $region), array_filter([
            'domain_id' => $domainId,
            'email' => $email,
            'type' => $type,
            'reason' => $reason,
        ]));
    }

    public function deleteBlocklist(string $id, ?string $region = null): ApiResponse
    {
        return $this->delete($this->path('/blocklists/'.$id, $region));
    }

    public function projectSettings(?string $region = null): ApiResponse
    {
        return $this->get($this->path('/project-settings', $region));
    }

    public function updateProjectSettings(array $fields, ?string $region = null): ApiResponse
    {
        return $this->patch($this->path('/project-settings', $region), $fields);
    }

    private function path(string $suffix, ?string $region): string
    {
        return $this->regional(self::PRODUCT, self::VERSION, $suffix, $region);
    }
}
