<?php

namespace Projects\Klinik\Controllers\API\Component\Jasa;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\Jasa;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Component\Jasa\{
    ViewRequest, StoreRequest, DeleteRequest
};

class JasaController extends ApiController{
    public function __construct(
        protected Jasa $__jasa_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__jasa_schema->viewJasaList();
    }

    public function store(StoreRequest $request){
        return $this->__jasa_schema->storeJasa();
    }

    public function destroy(DeleteRequest $request){
        return $this->__jasa_schema->deleteJasa();
    }
}