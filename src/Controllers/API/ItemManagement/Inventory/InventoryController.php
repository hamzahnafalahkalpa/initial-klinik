<?php

namespace Projects\Klinik\Controllers\API\ers\API\ItemManagement\Inventory;

use Hanafalah\ModuleWarehouse\Contracts\Schemas\Inventory;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Inventory\{
    ViewRequest, StoreRequest, DeleteRequest
};

class InventoryController extends ApiController{
    public function __construct(
        protected Inventory $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewInventoryList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeInventory();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteInventory();
    }
}

// ├── Master Obat
// ├── Master BMHP
// ├── Master Medical Equipment
// ├── Master Office Supplies
// ├── Master Cleaning Supplies