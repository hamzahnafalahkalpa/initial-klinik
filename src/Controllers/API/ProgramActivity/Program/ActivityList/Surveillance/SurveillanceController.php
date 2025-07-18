<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Program\ActivityList;

use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProgramActivity\Program\ActivityList\Surveillance\{
    ViewRequest, StoreRequest, DeleteRequest
};

class SurveillanceController extends ApiController{
    public function __construct(
        protected Surveillance $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewActivityListList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeActivityList();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteActivityList();
    }

    public function show(ViewRequest $request){
        return $this->__schema->showActivityList();
    }
}