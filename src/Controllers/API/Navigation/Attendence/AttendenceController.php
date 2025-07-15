<?php

namespace Projects\Klinik\Controllers\API\Navigation\Attendence;

use Hanafalah\ModuleEmployee\Contracts\Schemas\Attendence;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Navigation\Attendence\{
    ViewRequest, StoreRequest
};

class AttendenceController extends ApiController{
    public function __construct(
        protected Attendence $__attendence
    ){
        parent::__construct();
    }

    private function localRequest(){
        $this->userAttempt();
        request()->merge([
            'employee_id'   => $this->global_employee->getKey()
        ]);
    }

    public function store(StoreRequest $request){
        $this->localRequest();
        return $this->__attendence->storeAttendence();
    }
}