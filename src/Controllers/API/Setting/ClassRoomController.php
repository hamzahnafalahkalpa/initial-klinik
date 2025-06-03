<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleClassRoom\Contracts\ClassRoom;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\ClassRoom\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ClassRoomController extends ApiController{
    public function __construct(
        protected ClassRoom $_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->_schema->viewClassRoomList();
    }

    public function store(StoreRequest $request){
        return $this->_schema->storeClassRoom();
    }

    public function destroy(DeleteRequest $request){
        return $this->_schema->deleteClassRoom();
    }
}