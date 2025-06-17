<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModulePeople\Contracts\Schemas\Education;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Education\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class EducationController extends ApiController{
    public function __construct(
        protected Education $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewEducationList();
    }

    public function show(ShowRequest $request) {
        return $this->__schema->showEducation();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeEducation();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteEducation();
    }
}
