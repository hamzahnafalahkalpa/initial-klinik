<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Program\ActivityList;

use Projects\Klinik\Controllers\API\ApiController;
use Hanafalah\ModuleEvent\Contracts\Schemas\ActivityList;
use Projects\Klinik\Requests\API\ProgramActivity\Program\ActivityList\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ActivityListController extends ApiController{
    public function __construct(
        protected ActivityList $__schema
    ){
        parent::__construct();
        request()->merge([
            'parent_id' => request()->program_id
        ]);
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