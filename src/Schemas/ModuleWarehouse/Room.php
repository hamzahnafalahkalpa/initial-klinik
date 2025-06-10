<?php

namespace Projects\Klinik\Schemas\ModuleWarehouse;

use Hanafalah\ModuleWarehouse\Schemas\Room as SchemasRoom;
use Illuminate\Database\Eloquent\Model;
use Projects\Klinik\Contracts\Schemas\ModuleWarehouse\Room as ModuleWarehouseRoom;

class Room extends SchemasRoom implements ModuleWarehouseRoom{
    public function prepareStoreRoom(mixed $room_dto): Model{
        if (isset($room_dto->building)){
            $building = $this->schemaContract('building')->prepareStoreBuilding($room_dto->building);
            $room_dto->building_id = $building->getKey();
            $room_dto->props['prop_building'] = [
                'id'   => $building->getKey(),
                'name' => $building->name
            ];
        }

        $room = $this->RoomModel()->updateOrCreate([
            'id'          => $room_dto->id ?? null,
        ], [
            'building_id' => $room_dto->building_id,
            'name'        => $room_dto->name,
            'medic_service_id' => $room_dto->medic_service_id,
            'service_cluster_id' => $room_dto->service_cluster_id
        ]);
        $this->fillingProps($room,$room_dto->props);
        $room->save();
        $this->forgetTags('room');
        return static::$room_model = $room;
    }
}