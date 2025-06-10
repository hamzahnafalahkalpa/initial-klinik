<?php

namespace Projects\Klinik\Contracts\Data\ModuleWarehouse;

use Hanafalah\ModuleWarehouse\Data\RoomData as ModuleWarehouseRoomData;
use Projects\Klinik\Contracts\Data\ModuleWarehouse\RoomData as DataModuleWarehouseRoomData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class RoomData extends ModuleWarehouseRoomData implements DataModuleWarehouseRoomData{
    #[MapInputName('medic_service_id')]
    #[MapName('medic_service_id')]
    public ?int $medic_service_id = null;

    #[MapInputName('service_cluster_id')]
    #[MapName('service_cluster_id')]
    public ?int $service_cluster_id = null;

    public static function after(mixed $data): RoomData{
        $new = static::new();
        $data->props['prop_medic_service'] = [
            'id'   => $data->medic_service_id ?? null,
            'name' => null
        ];
        if (isset($data->medic_service_id)){
            $medic_service = $new->MedicServiceModel()->findOrFail($data->medic_service_id);
            $data->props['prop_medic_service']['name'] = $medic_service->name;
        }

        $data->props['prop_service_cluster'] = [
            'id'   => $data->service_cluster_id ?? null,
            'name' => null
        ];
        if (isset($data->service_cluster_id)){
            $service_cluster = $new->ServiceClusterModel()->findOrFail($data->service_cluster_id);
            $data->props['prop_service_cluster']['name'] = $service_cluster->name;
        }
        return $data;
    }
}