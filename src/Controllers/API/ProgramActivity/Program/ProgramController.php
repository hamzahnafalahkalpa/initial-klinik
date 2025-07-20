<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Program;

use Projects\Klinik\Controllers\API\ApiController;
use Hanafalah\ModuleEvent\Contracts\Schemas\Program;
use Projects\Klinik\Requests\API\ProgramActivity\Program\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ProgramController extends ApiController{
    public function __construct(
        protected Program $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewProgramPaginate();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeProgram();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteProgram();
    }

    public function show(ViewRequest $request){
        return $this->__schema->showProgram();
    }
}