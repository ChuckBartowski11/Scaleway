<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class DnsApi extends AbstractApi
{
    private const BASE = '/domain/v2beta1';

    public function domains(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/domains', $query);
    }

    public function domain(string $name): ApiResponse
    {
        return $this->get(self::BASE.'/domains/'.rawurlencode($name));
    }

    public function zones(array $query = []): ApiResponse
    {
        return $this->get(self::BASE.'/dns-zones', $query);
    }

    public function createZone(string $domain, string $subdomain = '', array $options = []): ApiResponse
    {
        return $this->post(self::BASE.'/dns-zones', $this->withProject(array_merge($options, [
            'domain' => $domain,
            'subdomain' => $subdomain,
        ]), 'project_id'));
    }

    public function deleteZone(string $zone): ApiResponse
    {
        return $this->delete(self::BASE.'/dns-zones/'.rawurlencode($zone));
    }

    public function records(string $zone, array $query = []): ApiResponse
    {
        return $this->get(sprintf('%s/dns-zones/%s/records', self::BASE, rawurlencode($zone)), $query);
    }

    public function updateRecords(string $zone, array $changes, array $options = []): ApiResponse
    {
        return $this->patch(sprintf('%s/dns-zones/%s/records', self::BASE, rawurlencode($zone)), array_merge($options, [
            'changes' => $changes,
        ]));
    }

    public function addRecord(string $zone, string $name, string $type, string $data, int $ttl = 3600, array $options = []): ApiResponse
    {
        return $this->updateRecords($zone, [
            [
                'add' => [
                    'records' => [array_merge($options, [
                        'name' => $name,
                        'type' => $type,
                        'data' => $data,
                        'ttl' => $ttl,
                    ])],
                ],
            ],
        ]);
    }

    public function deleteRecord(string $zone, string $name, string $type, ?string $data = null): ApiResponse
    {
        return $this->updateRecords($zone, [
            [
                'delete' => [
                    'id_fields' => array_filter([
                        'name' => $name,
                        'type' => $type,
                        'data' => $data,
                    ], static fn (mixed $v): bool => null !== $v),
                ],
            ],
        ]);
    }

    public function exportZone(string $zone, string $format = 'bind'): ApiResponse
    {
        return $this->get(sprintf('%s/dns-zones/%s/raw', self::BASE, rawurlencode($zone)), ['format' => $format]);
    }

    public function refreshZone(string $zone): ApiResponse
    {
        return $this->post(sprintf('%s/dns-zones/%s/refresh', self::BASE, rawurlencode($zone)));
    }
}
