<?php

namespace Projects\Klinik\Controllers\API\ItemManagement\Inventory;

use Hanafalah\ModuleItem\Contracts\Schemas\Inventory;
use Hanafalah\ModuleItem\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ItemManagement\Inventory\{
    ViewRequest, StoreRequest, DeleteRequest
};

class InventoryController extends ApiController{
    public function __construct(
        protected Inventory $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewInventoryPaginate();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeInventory();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteInventory();
    }
}