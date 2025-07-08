<?php

namespace Projects\Klinik\{{controller_namespace}}\API\Profile2;

use Projects\Klinik\Contracts\Schemas\Profile2;
use Projects\Klinik\{{controller_namespace}}\API\ApiController;
use Projects\Klinik\Requests\API\Profile2\{
    ViewRequest, StoreRequest, DeleteRequest
};

class Profile2Controller extends ApiController{
    public function __construct(
        protected Profile2 $__profile2_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__profile2_schema->viewProfile2List();
    }

    public function store(StoreRequest $request){
        return $this->__profile2_schema->storeProfile2();
    }

    public function destroy(DeleteRequest $request){
        return $this->__profile2_schema->deleteProfile2();
    }
}