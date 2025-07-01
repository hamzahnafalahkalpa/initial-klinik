<?php

namespace Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\ReceiveOrder;

use Hanafalah\ModuleProcurement\Contracts\Schemas\ReceiveOrder;
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\ProcurementController;
use Projects\Klinik\Requests\API\ItemManagement\SupplyChain\ReceiveOrder\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ReceiveOrderController extends ProcurementController
{
    public function __construct(
        protected ReceiveOrder $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewReceiveOrderPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showReceiveOrder();
    }

    public function store(StoreRequest $request){
        $this->receiveOrderSetup();
        return $this->__schema->storeReceiveOrder();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteReceiveOrder();
    }
}