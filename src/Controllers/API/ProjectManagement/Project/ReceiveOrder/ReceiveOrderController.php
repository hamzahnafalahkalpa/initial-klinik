<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Project\ReceiveOrder;

use Hanafalah\ModuleProcurement\Contracts\Schemas\ReceiveOrder;
use Projects\Klinik\Controllers\API\Procurement\ProcurementController;
use Projects\Klinik\Requests\API\ProjectManagement\Project\ReceiveOrder\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ReceiveOrderController extends ProcurementController
{
    public function __construct(
        protected ReceiveOrder $__purchase_request_schema
    ){}

    public function index(ViewRequest $request){
        return $this->__purchase_request_schema->conditionals(function($query){
            $query->when(isset(request()->project_id),function($query){
                $query->whereHas('procurement',function($query){
                    $query->where('warehouse_type','Project')->where('warehouse_id',request()->project_id);
                });
            }); 
        })->viewReceiveOrderPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__purchase_request_schema->showReceiveOrder();
    }

    public function store(StoreRequest $request){
        $this->receiveOrderSetup();
        return $this->__purchase_request_schema->storeReceiveOrder();
    }

    public function destroy(DeleteRequest $request){
        return $this->__purchase_request_schema->deleteReceiveOrder();
    }
}