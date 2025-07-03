<?php

namespace Hanafalah\ModuleEvent\Controllers\API\ProgramActivity\Program;

use Hanafalah\ModuleEvent\Contracts\Schemas\Program;
use Hanafalah\ModuleEvent\Requests\API\Program\{
    ViewRequest, StoreRequest, DeleteRequest
};
use Illuminate\Http\Request;
use Projects\Klinik\Controllers\API\ApiController;

class ProgramController extends ApiController{
    public function __construct(
        protected Program $__program_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__program_schema->viewProgramList();
    }

    public function store(StoreRequest $request){
        return $this->__program_schema->storeProgram();
    }

    public function destroy(DeleteRequest $request){
        return $this->__program_schema->deleteProgram();
    }

    public function show(ViewRequest $request){
        return $this->__program_schema->showProgram();
    }

    public function update(ViewRequest $request){
        return $this->__program_schema->updateProgram();
    }

    public function status(Request $request){
        return $this->transaction(function(){
            
        });
    }
}