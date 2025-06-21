<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleExamination\Contracts\Schemas\ServiceLabel;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\ServiceLabel\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ServiceLabelController extends ApiController{
    public function __construct(
        protected ServiceLabel $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewServiceLabelList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeServiceLabel();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteServiceLabel();
    }
}
