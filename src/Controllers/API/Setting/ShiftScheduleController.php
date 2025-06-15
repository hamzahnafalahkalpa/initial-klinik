<?php

namespace Projects\Klinik\Controllers\API\Setting\ShiftSchedule;

use Hanafalah\ModuleEmployee\Contracts\Schemas\ShiftSchedule;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\ShiftSchedule\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ShiftScheduleController extends ApiController{
    public function __construct(
        protected ShiftSchedule $__schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewShiftList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeShift();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteShift();
    }
}