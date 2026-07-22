<?php

declare(strict_types=1);

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use ChuckBartowski\ScalewaySdk\Exception\ScalewaySdkExceptionInterface;
use ChuckBartowski\ScalewaySdk\Scaleway;

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

function scalewaysdk_MetaData(): array
{
    return [
        'DisplayName' => 'Scaleway Instance (SDK)',
        'APIVersion' => '1.1',
        'RequiresServer' => true,
    ];
}

function scalewaysdk_ConfigOptions(): array
{
    return [
        'Commercial type' => ['Type' => 'text', 'Size' => '15', 'Default' => 'DEV1-S', 'Description' => 'e.g. DEV1-S, PRO2-XXS'],
        'Image' => ['Type' => 'text', 'Size' => '20', 'Default' => 'ubuntu_jammy', 'Description' => 'Image label or id'],
        'Zone' => ['Type' => 'text', 'Size' => '12', 'Default' => 'fr-par-1', 'Description' => 'Availability zone'],
        'Project id' => ['Type' => 'text', 'Size' => '38', 'Description' => 'Scaleway project id'],
    ];
}

function scalewaysdk_scaleway(array $params): Scaleway
{
    $client = new ScalewayClient(
        secretKey: $params['serveraccesshash'] ?: $params['serverpassword'],
        defaultProjectId: $params['configoption4'] ?: '',
        defaultZone: $params['configoption3'] ?: 'fr-par-1',
    );

    return new Scaleway($client);
}

function scalewaysdk_name(array $params): string
{
    return 'whmcs-'.$params['serviceid'];
}

function scalewaysdk_findId(Scaleway $scaleway, array $params): ?string
{
    $server = $scaleway->instances()->servers(['name' => scalewaysdk_name($params)], $params['configoption3'] ?: null)->first('servers');

    return \is_array($server) ? ($server['id'] ?? null) : null;
}

function scalewaysdk_TestConnection(array $params): array
{
    try {
        scalewaysdk_scaleway($params)->instances()->servers([], $params['configoption3'] ?: null);

        return ['success' => true, 'error' => ''];
    } catch (ScalewaySdkExceptionInterface $e) {
        return ['success' => false, 'error' => $e->getMessage()];
    }
}

function scalewaysdk_CreateAccount(array $params): string
{
    try {
        $scaleway = scalewaysdk_scaleway($params);
        $created = $scaleway->instances()->createServer(
            scalewaysdk_name($params),
            $params['configoption1'] ?: 'DEV1-S',
            $params['configoption2'] ?: 'ubuntu_jammy',
        );
        $id = $created->data('server')['id'];
        $scaleway->instances()->serverAction($id, 'poweron');
        $scaleway->instances()->waitForServerState($id, 'running');

        return 'success';
    } catch (ScalewaySdkExceptionInterface $e) {
        return $e->getMessage();
    }
}

function scalewaysdk_SuspendAccount(array $params): string
{
    try {
        $scaleway = scalewaysdk_scaleway($params);
        $id = scalewaysdk_findId($scaleway, $params);

        if (null !== $id) {
            $scaleway->instances()->powerOff($id);
        }

        return 'success';
    } catch (ScalewaySdkExceptionInterface $e) {
        return $e->getMessage();
    }
}

function scalewaysdk_UnsuspendAccount(array $params): string
{
    try {
        $scaleway = scalewaysdk_scaleway($params);
        $id = scalewaysdk_findId($scaleway, $params);

        if (null !== $id) {
            $scaleway->instances()->powerOn($id);
        }

        return 'success';
    } catch (ScalewaySdkExceptionInterface $e) {
        return $e->getMessage();
    }
}

function scalewaysdk_TerminateAccount(array $params): string
{
    try {
        $scaleway = scalewaysdk_scaleway($params);
        $id = scalewaysdk_findId($scaleway, $params);

        if (null !== $id) {
            $scaleway->instances()->serverAction($id, 'terminate');
        }

        return 'success';
    } catch (ScalewaySdkExceptionInterface $e) {
        return $e->getMessage();
    }
}
