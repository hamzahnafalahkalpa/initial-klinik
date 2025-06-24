<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleMedicalItem\Contracts\Schemas\DosageForm;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\DosageForm\{
    ViewRequest, StoreRequest, DeleteRequest
};

class DosageFormController extends ApiController{
    public function __construct(
        protected DosageForm $__dosageform_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__dosageform_schema->viewDosageFormList();
    }

    public function store(StoreRequest $request){
        return $this->__dosageform_schema->storeDosageForm();
    }

    public function destroy(DeleteRequest $request){
        return $this->__dosageform_schema->deleteDosageForm();
    }
}