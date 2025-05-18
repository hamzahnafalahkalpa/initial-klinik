<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Manufacturing;

use Hanafalah\ModuleManufacture\Contracts\Schemas\Material;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\Material\{
    ViewRequest, StoreRequest, DeleteRequest
};

class MaterialController extends ApiController
{
    public function __construct(protected Material $__material_schema){}

    public function index(ViewRequest $request){
        return $this->__material_schema->viewMaterialList();
    }

    public function store(StoreRequest $request){
        return $this->__material_schema->storeMaterial();
    }

    public function destroy(DeleteRequest $request){
        return $this->__material_schema->deleteMaterial();
    }
}