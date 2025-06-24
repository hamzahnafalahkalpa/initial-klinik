<?php

namespace Projects\Klinik\Controllers\API\ItemManagement\MedicalItem;

use Hanafalah\ModuleMedicalItem\Contracts\Schemas\MedicalItem;
use Projects\Klinik\Requests\ItemManagement\MedicalItem\{
    ViewRequest, StoreReqeust, DeleteRequest
};
use Projects\Klinik\Controllers\API\ApiController;

class MedicalItemController extends ApiController{
    public function __construct(
        protected MedicalItem $__schema    
    ){}

    public function index(ViewRequest $request) {
        return $this->__schema->viewMedicalItemPaginate([
            $this->MedicineModel()->getMorphClass(),
            $this->MedicToolModel()->getMorphClass()
        ]);
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeMedicalItem($request);
    }
}
