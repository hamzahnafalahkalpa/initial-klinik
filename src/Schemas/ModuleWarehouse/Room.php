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
            'room_number'        => $room_dto->room_number,
            'medic_service_id'   => $room_dto->medic_service_id,
            'service_cluster_id' => $room_dto->service_cluster_id
        ]);
    }

    protected function prepareStoreModelHasRooms(mixed &$room_dto): self{
        $model_has_room_ids = [];
        if (isset($room_dto->model_has_rooms) && count($room_dto->model_has_rooms) > 0){
            foreach ($room_dto->model_has_rooms as $model_has_room) {
                $model_has_room->warehouse_id = $room_dto->id;
                $model_has_room = $this->prepareStoreModelHasRoom($model_has_room);
                $model_has_room_ids[] = $model_has_room->id;
            }
        }
        $this->ModelHasRoomModel()->whereNotIn('id', $model_has_room_ids)
            ->where('warehouse_id',$room_dto->id)
            ->where('warehouse_type','Room')
            ->delete();
        return $this;
    }
}