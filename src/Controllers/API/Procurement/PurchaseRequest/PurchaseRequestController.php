<?php

namespace Projects\Klinik\Controllers\API\Procurement\PurchaseRequest;

use Hanafalah\ModuleProcurement\Contracts\Schemas\PurchaseRequest;
use Projects\Klinik\Controllers\API\Procurement\ProcurementController;
use Projects\Klinik\Requests\API\Procurement\PurchaseRequest\{
    ViewRequest, StoreRequest, DeleteRequest, ShowRequest
};

class PurchaseRequestController extends ProcurementController{
    public function __construct(
        protected PurchaseRequest $__purchase_request_schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__purchase_request_schema->conditionals(function($query){
            $query->when(isset(request()->project_id),function($query){
                $query->whereHas('procurement',function($query){
                    $query->where('warehouse_type','Project')->where('warehouse_id',request()->project_id);
                });
            }); 
        })->viewPurchaseRequestPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__purchase_request_schema->showPurchaseRequest();
    }
}