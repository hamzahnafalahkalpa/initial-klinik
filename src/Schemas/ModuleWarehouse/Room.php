<?php

namespace Projects\Klinik\Schemas\ModuleWarehouse;

use Hanafalah\ModuleWarehouse\Schemas\Room as SchemasRoom;
use Illuminate\Database\Eloquent\Model;
use Projects\Klinik\Contracts\Schemas\ModuleWarehouse\Room as ModuleWarehouseRoom;

class Room extends SchemasRoom implements ModuleWarehouseRoom{

    public function createRoom(mixed $room_dto): Model{
        return $this->RoomModel()->updateOrCreate([
            'id'          => $room_dto->id ?? null,
        ], [
            'building_id'        => $room_dto->building_id,
            'name'               => $room_dto->name,
            'medic_service_id'   => $room_dto->medic_service_id,
            'service_cluster_id' => $room_dto->service_cluster_id
        ]);
    }
}