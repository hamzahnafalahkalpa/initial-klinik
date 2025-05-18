<?php

namespace Projects\Klinik\Controllers\API\Procurement\Supplier;

use Hanafalah\ModuleProcurement\Contracts\Schemas\Supplier;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Procurement\Supplier\{
    ViewRequest, StoreRequest, DeleteRequest
};

class SupplierController extends ApiController{
    public function __construct(
        protected Supplier $__supplier_schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__supplier_schema->viewSupplierList();
    }

    public function store(StoreRequest $request){
        return $this->__supplier_schema->storeSupplier();
    }

    public function destroy(DeleteRequest $request){
        return $this->__supplier_schema->deleteSupplier();
    }
}