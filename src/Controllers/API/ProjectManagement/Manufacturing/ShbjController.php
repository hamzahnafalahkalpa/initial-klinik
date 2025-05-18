<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Manufacturing;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\Shbj;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\Shbj\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ShbjController extends ApiController
{
    public function __construct(protected Shbj $__shbj_schema){}

    public function index(ViewRequest $request){
        return $this->__shbj_schema->viewShbjPaginate();
    }

    public function store(StoreRequest $request){
        return $this->__shbj_schema->storeShbj();
    }

    public function destroy(DeleteRequest $request){
        return $this->__shbj_schema->deleteShbj();
    }
}