<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleWarehouse\Contracts\Schemas\Room;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Room\{
    ViewRequest, StoreRequest, DeleteRequest
};

class RoomController extends ApiController{
    public function __construct(
        protected Room $_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->_schema->viewRoomList();
    }

    public function store(StoreRequest $request){
        return $this->_schema->storeRoom();
    }

    public function destroy(DeleteRequest $request){
        return $this->_schema->deleteRoom();
    }
}