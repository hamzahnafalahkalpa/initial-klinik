<?php

namespace Projects\Klinik\Controllers\API\Unicode\AnggaranStuff;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\AnggaranStuff;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Unicode\AnggaranStuff\{
    ViewRequest, StoreRequest, DeleteRequest
};

class AnggaranStuffController    extends ApiController{
    public function __construct(
        protected AnggaranStuff $__stuff_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__stuff_schema->viewAnggaranStuffList();
    }

    public function store(StoreRequest $request){
        return $this->__stuff_schema->storeAnggaranStuff();
    }

    public function destroy(DeleteRequest $request){
        return $this->__stuff_schema->deleteAnggaranStuff();
    }
}