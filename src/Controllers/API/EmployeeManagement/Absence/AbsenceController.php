<?php

namespace Projects\Klinik\Controllers\API\AbsenceManagement\Absence;

use Hanafalah\ModuleAbsence\Contracts\Schemas\Absence;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\AbsenceManagement\Absence\{
    ViewRequest, StoreRequest, ShowRequest,
    DeleteRequest
};

class AbsenceController extends ApiController{
    public function __construct(
        protected Absence $__absence_schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__absence_schema->viewAbsencePaginate();
    }

    public function show(ShowRequest $request){
        return $this->__absence_schema->showAbsence();
    }

    public function store(StoreRequest $request){
        return $this->__absence_schema->storeAbsence();
    }

    public function destroy(DeleteRequest $request){
        return $this->__absence_schema->deleteAbsence();
    }
}