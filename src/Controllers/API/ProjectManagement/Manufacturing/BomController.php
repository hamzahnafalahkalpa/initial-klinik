<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Manufacturing;

use Hanafalah\ModuleManufacture\Contracts\Schemas\Product;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\bom\{
    ViewRequest, StoreRequest, DeleteRequest
};

class BomController extends ApiController
{
    public function __construct(protected Product $__product_schema){}

    public function index(ViewRequest $request){
        return $this->__product_schema->viewProductList();
    }

    public function store(StoreRequest $request){
        if (isset(request()->materials)){
            $materials = request()->materials;
            foreach ($materials as &$material) {
                $material['item_type'] = 'Item';
            }
            request()->merge([
                'materials' => $materials
            ]);
        }
        return $this->__product_schema->storeProduct();
    }

    public function destroy(DeleteRequest $request){
        return $this->__product_schema->deleteProduct();
    }
}