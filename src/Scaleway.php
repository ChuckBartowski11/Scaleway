<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk;

use ChuckBartowski\ScalewaySdk\Api\AccountApi;
use ChuckBartowski\ScalewaySdk\Api\AppleSiliconApi;
use ChuckBartowski\ScalewaySdk\Api\AuditTrailApi;
use ChuckBartowski\ScalewaySdk\Api\AutoscalingApi;
use ChuckBartowski\ScalewaySdk\Api\BareMetalApi;
use ChuckBartowski\ScalewaySdk\Api\BillingApi;
use ChuckBartowski\ScalewaySdk\Api\BlockStorageApi;
use ChuckBartowski\ScalewaySdk\Api\CockpitApi;
use ChuckBartowski\ScalewaySdk\Api\ContainerApi;
use ChuckBartowski\ScalewaySdk\Api\DnsApi;
use ChuckBartowski\ScalewaySdk\Api\EdgeServicesApi;
use ChuckBartowski\ScalewaySdk\Api\FileStorageApi;
use ChuckBartowski\ScalewaySdk\Api\FlexibleIpApi;
use ChuckBartowski\ScalewaySdk\Api\FunctionApi;
use ChuckBartowski\ScalewaySdk\Api\IamApi;
use ChuckBartowski\ScalewaySdk\Api\InferenceApi;
use ChuckBartowski\ScalewaySdk\Api\InstanceApi;
use ChuckBartowski\ScalewaySdk\Api\IotApi;
use ChuckBartowski\ScalewaySdk\Api\IpamApi;
use ChuckBartowski\ScalewaySdk\Api\KeyManagerApi;
use ChuckBartowski\ScalewaySdk\Api\KubernetesApi;
use ChuckBartowski\ScalewaySdk\Api\LoadBalancerApi;
use ChuckBartowski\ScalewaySdk\Api\MarketplaceApi;
use ChuckBartowski\ScalewaySdk\Api\MessagingApi;
use ChuckBartowski\ScalewaySdk\Api\MongoDbApi;
use ChuckBartowski\ScalewaySdk\Api\PublicGatewayApi;
use ChuckBartowski\ScalewaySdk\Api\RdbApi;
use ChuckBartowski\ScalewaySdk\Api\RedisApi;
use ChuckBartowski\ScalewaySdk\Api\RegistryApi;
use ChuckBartowski\ScalewaySdk\Api\SecretManagerApi;
use ChuckBartowski\ScalewaySdk\Api\ServerlessJobApi;
use ChuckBartowski\ScalewaySdk\Api\ServerlessSqlApi;
use ChuckBartowski\ScalewaySdk\Api\TransactionalEmailApi;
use ChuckBartowski\ScalewaySdk\Api\VpcApi;
use ChuckBartowski\ScalewaySdk\Api\WebHostingApi;
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

    public function publicGateways(): PublicGatewayApi
    {
        return $this->apis[PublicGatewayApi::class] ??= new PublicGatewayApi($this->client);
    }

    public function redis(): RedisApi
    {
        return $this->apis[RedisApi::class] ??= new RedisApi($this->client);
    }

    public function blockStorage(): BlockStorageApi
    {
        return $this->apis[BlockStorageApi::class] ??= new BlockStorageApi($this->client);
    }

    public function containers(): ContainerApi
    {
        return $this->apis[ContainerApi::class] ??= new ContainerApi($this->client);
    }

    public function functions(): FunctionApi
    {
        return $this->apis[FunctionApi::class] ??= new FunctionApi($this->client);
    }

    public function transactionalEmail(): TransactionalEmailApi
    {
        return $this->apis[TransactionalEmailApi::class] ??= new TransactionalEmailApi($this->client);
    }

    public function webHosting(): WebHostingApi
    {
        return $this->apis[WebHostingApi::class] ??= new WebHostingApi($this->client);
    }

    public function secrets(): SecretManagerApi
    {
        return $this->apis[SecretManagerApi::class] ??= new SecretManagerApi($this->client);
    }

    public function appleSilicon(): AppleSiliconApi
    {
        return $this->apis[AppleSiliconApi::class] ??= new AppleSiliconApi($this->client);
    }

    public function jobs(): ServerlessJobApi
    {
        return $this->apis[ServerlessJobApi::class] ??= new ServerlessJobApi($this->client);
    }

    public function mongodb(): MongoDbApi
    {
        return $this->apis[MongoDbApi::class] ??= new MongoDbApi($this->client);
    }

    public function serverlessSql(): ServerlessSqlApi
    {
        return $this->apis[ServerlessSqlApi::class] ??= new ServerlessSqlApi($this->client);
    }

    public function keyManager(): KeyManagerApi
    {
        return $this->apis[KeyManagerApi::class] ??= new KeyManagerApi($this->client);
    }

    public function edgeServices(): EdgeServicesApi
    {
        return $this->apis[EdgeServicesApi::class] ??= new EdgeServicesApi($this->client);
    }

    public function iot(): IotApi
    {
        return $this->apis[IotApi::class] ??= new IotApi($this->client);
    }

    public function autoscaling(): AutoscalingApi
    {
        return $this->apis[AutoscalingApi::class] ??= new AutoscalingApi($this->client);
    }

    public function marketplace(): MarketplaceApi
    {
        return $this->apis[MarketplaceApi::class] ??= new MarketplaceApi($this->client);
    }

    public function cockpit(): CockpitApi
    {
        return $this->apis[CockpitApi::class] ??= new CockpitApi($this->client);
    }

    public function auditTrail(): AuditTrailApi
    {
        return $this->apis[AuditTrailApi::class] ??= new AuditTrailApi($this->client);
    }

    public function messaging(): MessagingApi
    {
        return $this->apis[MessagingApi::class] ??= new MessagingApi($this->client);
    }

    public function fileStorage(): FileStorageApi
    {
        return $this->apis[FileStorageApi::class] ??= new FileStorageApi($this->client);
    }

    public function inference(): InferenceApi
    {
        return $this->apis[InferenceApi::class] ??= new InferenceApi($this->client);
    }

    public function flexibleIps(): FlexibleIpApi
    {
        return $this->apis[FlexibleIpApi::class] ??= new FlexibleIpApi($this->client);
    }
}
