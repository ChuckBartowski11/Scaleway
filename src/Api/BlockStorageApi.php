<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Api;

use ChuckBartowski\ScalewaySdk\Response\ApiResponse;

final class BlockStorageApi extends AbstractApi
{
    private const PRODUCT = 'block';
    private const VERSION = 'v1alpha1';

    public function volumes(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/volumes', $zone), $query);
    }

    public function volume(string $id, ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/volumes/'.$id, $zone));
    }

    public function createVolume(string $name, int $sizeBytes, ?int $perfIops = null, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/volumes', $zone), $this->withProject(array_merge($options, array_filter([
            'name' => $name,
            'from_empty' => ['size' => $sizeBytes],
            'perf_iops' => $perfIops,
        ], static fn (mixed $v): bool => null !== $v)), 'project_id'));
    }

    public function createVolumeFromSnapshot(string $name, string $snapshotId, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/volumes', $zone), $this->withProject(array_merge($options, [
            'name' => $name,
            'from_snapshot' => ['snapshot_id' => $snapshotId],
        ]), 'project_id'));
    }

    public function updateVolume(string $id, array $fields, ?string $zone = null): ApiResponse
    {
        return $this->patch($this->path('/volumes/'.$id, $zone), $fields);
    }

    public function deleteVolume(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/volumes/'.$id, $zone));
    }

    public function snapshots(array $query = [], ?string $zone = null): ApiResponse
    {
        return $this->get($this->path('/snapshots', $zone), $query);
    }

    public function createSnapshot(string $volumeId, string $name, array $options = [], ?string $zone = null): ApiResponse
    {
        return $this->post($this->path('/snapshots', $zone), $this->withProject(array_merge($options, [
            'volume_id' => $volumeId,
            'name' => $name,
        ]), 'project_id'));
    }

    public function deleteSnapshot(string $id, ?string $zone = null): ApiResponse
    {
        return $this->delete($this->path('/snapshots/'.$id, $zone));
    }

    private function path(string $suffix, ?string $zone): string
    {
        return $this->zonal(self::PRODUCT, self::VERSION, $suffix, $zone);
    }
}
