<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Project\PurchaseOrder;

use Hanafalah\ModuleProcurement\Contracts\Schemas\PurchaseOrder;
use Projects\Klinik\Controllers\API\Procurement\ProcurementController;
use Projects\Klinik\Requests\API\ProjectManagement\Project\PurchaseOrder\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class PurchaseOrderController extends ProcurementController
{
    public function __construct(
        protected PurchaseOrder $__purchase_order
    ){}

    public function index(ViewRequest $request){
        return $this->__purchase_order->conditionals(function($query){
            $query->when(isset(request()->project_id),function($query){
                $query->whereHas('procurement',function($query){
                    $query->where('warehouse_type','Project')->where('warehouse_id',request()->project_id);
                });
            }); 
        })->viewPurchaseOrderPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__purchase_order->showPurchaseOrder();
    }
}