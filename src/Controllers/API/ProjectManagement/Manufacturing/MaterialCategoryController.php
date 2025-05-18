<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Manufacturing;

use Hanafalah\ModuleManufacture\Contracts\Schemas\MaterialCategory;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\MaterialCategory\{
    ViewRequest, StoreRequest, DeleteRequest
};

class MaterialCategoryController extends ApiController
{
    public function __construct(protected MaterialCategory $__material_category_schema){}

    public function index(ViewRequest $request){
        return $this->__material_category_schema->viewMaterialCategoryList();
    }

    public function store(StoreRequest $request){
        return $this->__material_category_schema->storeMaterialCategory();
    }

    public function destroy(DeleteRequest $request){
        return $this->__material_category_schema->deleteMaterialCategory();
    }
}