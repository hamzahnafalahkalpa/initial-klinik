<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\ActivityList;

use Projects\Klinik\Controllers\API\ApiController;
use Hanafalah\ModuleEvent\Contracts\Schemas\ActivityList;
use Projects\Klinik\Requests\API\ProgramActivity\ActivityList\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ActivityListController extends ApiController{
    public function __construct(
        protected ActivityList $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewActivityListPaginate();
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