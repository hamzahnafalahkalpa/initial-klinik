<?php

namespace Projects\Klinik\Controllers\API\EmployeeManagement\JobDesk;

use Hanafalah\ModuleProfession\Contracts\Schemas\JobDesk;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\EmployeeManagement\JobDesk\{
    ViewRequest, StoreRequest, DeleteRequest
};

class JobDeskController extends ApiController{
    public function __construct(
        protected JobDesk $__job_desk_schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__job_desk_schema->viewJobDeskList();
    }

    public function store(StoreRequest $request){
        return $this->__job_desk_schema->storeJobDesk();
    }

    public function destroy(DeleteRequest $request){
        return $this->__job_desk_schema->deleteJobDesk();
    }
}