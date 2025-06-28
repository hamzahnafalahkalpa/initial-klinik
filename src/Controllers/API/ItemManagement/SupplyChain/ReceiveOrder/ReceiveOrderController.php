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
        return $this->__schema->conditionals(function($query){
            $query->when(isset(request()->room_id),function($query){
                $query->whereHas('procurement',function($query){
                    $query->where('warehouse_type','Room')->where('warehouse_id',request()->room_id);
                });
            }); 
        })->viewReceiveOrderPaginate();
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