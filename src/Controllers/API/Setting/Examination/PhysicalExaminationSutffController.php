<?php

namespace Projects\Klinik\Controllers\API\Setting\Examination;

use Hanafalah\ModulePhysicalExamination\Contracts\Schemas\PhysicalExaminationStuff;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Examination\PhysicalExamination\{
    ViewRequest, StoreRequest, DeleteRequest
};

class PhysicalExaminationStuffController extends ApiController{
    public function __construct(
        protected PhysicalExaminationStuff $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewPhysicalExaminationList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storePhysicalExamination();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePhysicalExamination();
    }
}
