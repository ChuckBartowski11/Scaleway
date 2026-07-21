<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class PublicGatewayApi extends AbstractApi
{
    private const PRODUCT = 'vpc-gw';
    private const VERSION = 'v2';

    public function gateways(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/gateways', $zone), $query);
    }

    public function gateway(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/gateways/'.$id, $zone));
    }

    public function createGateway(string $type, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/gateways', $zone), $this->withProject(array_merge($options, ['type' => $type]), 'project_id'));
    }

    public function updateGateway(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/gateways/'.$id, $zone), $fields);
    }

    public function deleteGateway(string $id, bool $deleteIp = false, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/gateways/'.$id, $zone), ['delete_ip' => $deleteIp ? 'true' : 'false']);
    }

    public function gatewayNetworks(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/gateway-networks', $zone), $query);
    }

    public function attachNetwork(string $gatewayId, string $privateNetworkId, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/gateway-networks', $zone), array_merge($options, [
            'gateway_id' => $gatewayId,
            'private_network_id' => $privateNetworkId,
        ]));
    }

    public function detachNetwork(string $gatewayNetworkId, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/gateway-networks/'.$gatewayNetworkId, $zone));
    }

    public function patRules(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/pat-rules', $zone), $query);
    }

    public function createPatRule(string $gatewayId, int $publicPort, string $privateIp, int $privatePort, string $protocol = 'both', ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/pat-rules', $zone), [
            'gateway_id' => $gatewayId,
            'public_port' => $publicPort,
            'private_ip' => $privateIp,
            'private_port' => $privatePort,
            'protocol' => $protocol,
        ]);
    }

    public function deletePatRule(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/pat-rules/'.$id, $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
