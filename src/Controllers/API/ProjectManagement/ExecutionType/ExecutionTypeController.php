<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\ExecutionType;

use Hanafalah\ModuleProject\Contracts\Schemas\Project\ExecutionType;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\ExecutionType\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ExecutionTypeController extends ApiController
{
    public function __construct(protected ExecutionType $__client_schema){}

    public function index(ViewRequest $request){
        return $this->__client_schema->viewExecutionTypeList();
    }

    public function show(ShowRequest $request){
        return $this->__client_schema->showExecutionType();
    }

    public function store(StoreRequest $request){
        return $this->__client_schema->storeExecutionType();
    }

    public function destroy(DeleteRequest $request){
        return $this->__client_schema->deleteExecutionType();
    }
}