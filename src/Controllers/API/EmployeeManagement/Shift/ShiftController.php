<?php

namespace Projects\Klinik\Controllers\API\EmployeeManagement\Shift;

use Hanafalah\ModuleEmployee\Contracts\Schemas\Shift;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\EmployeeManagement\Shift\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ShiftController extends ApiController{
    public function __construct(
        protected Shift $__occupation_schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__occupation_schema->viewShiftList();
    }

    public function store(StoreRequest $request){
        return $this->__occupation_schema->storeShift();
    }

    public function destroy(DeleteRequest $request){
        return $this->__occupation_schema->deleteShift();
    }
}