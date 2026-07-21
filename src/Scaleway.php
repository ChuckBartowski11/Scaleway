<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk;

use ChuckBartowski\ScalewaySdk\Api\AccountApi;
use ChuckBartowski\ScalewaySdk\Api\BareMetalApi;
use ChuckBartowski\ScalewaySdk\Api\BillingApi;
use ChuckBartowski\ScalewaySdk\Api\DnsApi;
use ChuckBartowski\ScalewaySdk\Api\IamApi;
use ChuckBartowski\ScalewaySdk\Api\InstanceApi;
use ChuckBartowski\ScalewaySdk\Api\IpamApi;
use ChuckBartowski\ScalewaySdk\Api\KubernetesApi;
use ChuckBartowski\ScalewaySdk\Api\LoadBalancerApi;
use ChuckBartowski\ScalewaySdk\Api\RdbApi;
use ChuckBartowski\ScalewaySdk\Api\RegistryApi;
use ChuckBartowski\ScalewaySdk\Api\VpcApi;
use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;

final class Scaleway
{
    private array $apis = [];

    public function __construct(private readonly ScalewayClient $client)
    {
    }

    public function client(): ScalewayClient
    {
        return $this->client;
    }

    public function instances(): InstanceApi
    {
        return $this->apis[InstanceApi::class] ??= new InstanceApi($this->client);
    }

    public function bareMetal(): BareMetalApi
    {
        return $this->apis[BareMetalApi::class] ??= new BareMetalApi($this->client);
    }

    public function vpc(): VpcApi
    {
        return $this->apis[VpcApi::class] ??= new VpcApi($this->client);
    }

    public function ipam(): IpamApi
    {
        return $this->apis[IpamApi::class] ??= new IpamApi($this->client);
    }

    public function loadBalancers(): LoadBalancerApi
    {
        return $this->apis[LoadBalancerApi::class] ??= new LoadBalancerApi($this->client);
    }

    public function databases(): RdbApi
    {
        return $this->apis[RdbApi::class] ??= new RdbApi($this->client);
    }

    public function kubernetes(): KubernetesApi
    {
        return $this->apis[KubernetesApi::class] ??= new KubernetesApi($this->client);
    }

    public function registry(): RegistryApi
    {
        return $this->apis[RegistryApi::class] ??= new RegistryApi($this->client);
    }

    public function dns(): DnsApi
    {
        return $this->apis[DnsApi::class] ??= new DnsApi($this->client);
    }

    public function account(): AccountApi
    {
        return $this->apis[AccountApi::class] ??= new AccountApi($this->client);
    }

    public function iam(): IamApi
    {
        return $this->apis[IamApi::class] ??= new IamApi($this->client);
    }

    public function billing(): BillingApi
    {
        return $this->apis[BillingApi::class] ??= new BillingApi($this->client);
    }
}
