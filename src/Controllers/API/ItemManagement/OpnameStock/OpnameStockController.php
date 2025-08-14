<?php

namespace Projects\Klinik\Controllers\API\ItemManagement\OpnameStock;

use Hanafalah\ApiHelper\Requests\Token\ShowRequest;
use Hanafalah\ModuleOpnameStock\Contracts\Schemas\OpnameStock\OpnameStock;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ItemManagement\OpnameStock\{
    DeleteRequest, StoreRequest, ViewRequest
};

class OpnameStockController extends ApiController{
    public function __construct(
        protected OpnameStock $__schema    
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request) {
        $flag = request()->flag ?? [
            $this->MedicineModelMorph(),
            $this->MedicToolModelMorph()
        ];
        request()->merge([
            'flag' => $flag
        ]);
        return $this->__schema->viewOpnameStockPaginate();
    }

    public function store(StoreRequest $request){
        $reference = request()->medicine ?? request()->medic_tool ?? request()->reagent;
        request()->merge([
            'reference'   => $reference,
            'medicine'    => null,
            'medic_tool'  => null,
            'reagent'     => null,
        ]);
        return $this->__schema->storeOpnameStock();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showOpnameStock();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteOpnameStock();
    }
}
