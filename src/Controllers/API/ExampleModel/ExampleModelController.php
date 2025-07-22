<?php

namespace Projects\Klinik\Controllers\API\ExampleModel;

use Projects\Klinik\Contracts\Schemas\ExampleModel;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ExampleModel\{
    ViewRequest, StoreRequest, ShowRequest, DeleteRequest
};

class ExampleModelController extends ApiController{
    public function __construct(
        protected ExampleModel $__examplemodel_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__examplemodel_schema->viewExampleModelPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__examplemodel_schema->showExampleModel();
    }

    public function store(StoreRequest $request){
        return $this->__examplemodel_schema->storeExampleModel();
    }

    public function destroy(DeleteRequest $request){
        return $this->__examplemodel_schema->deleteExampleModel();
    }
}