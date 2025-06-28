<?php

namespace Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\PurchaseRequest;

use Hanafalah\ModuleProcurement\Contracts\Schemas\PurchaseRequest;
use Projects\Klinik\Requests\API\ItemManagement\SupplyChain\PurchaseRequest\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\ProcurementController;

class PurchaseRequestController extends ProcurementController
{
    public function __construct(
        protected PurchaseRequest $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->conditionals(function($query){
            $query->when(isset(request()->room_id),function($query){
                $query->whereHas('procurement',function($query){
                    $query->where('warehouse_type','Room')->where('warehouse_id',request()->room_id);
                });
            }); 
        })->viewPurchaseRequestPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showPurchaseRequest();
    }

    public function store(StoreRequest $request){
        $procurement = $this->procurementSetup(request()->procurement);
        request()->merge(['procurement' => $procurement]);
        return $this->__schema->storePurchaseRequest();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePurchaseRequest();
    }
}