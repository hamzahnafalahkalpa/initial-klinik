<?php

namespace Projects\Klinik\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Projects\Klinik\{
    Supports\BaseKlinik
};
use Projects\Klinik\Contracts\Schemas\ServiceCluster as ContractsServiceCluster;
use Projects\Klinik\Contracts\Data\ServiceClusterData;

class ServiceCluster extends BaseKlinik implements ContractsServiceCluster
{
    protected string $__entity = 'ServiceCluster';
    public static $service_cluster_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'service_cluster',
            'tags'     => ['service_cluster', 'service_cluster-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreServiceCluster(ServiceClusterData $service_cluster_dto): Model{
        $service_cluster = $this->usingEntity()->updateOrCreate([
                        'id' => $service_cluster_dto->id ?? null
                    ], [
                        'name' => $service_cluster_dto->name
                    ]);
        $this->fillingProps($service_cluster,$service_cluster_dto->props);
        $service_cluster->save();
        return static::$service_cluster_model = $service_cluster;
    }
}