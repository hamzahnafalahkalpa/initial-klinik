<?php

namespace Projects\Klinik\Controllers\API\Transaction\PointOfSale;

use Projects\Klinik\Controllers\API\Transaction\PointOfSale\EnvironmentController;
use Projects\Klinik\Requests\API\Transaction\PointOfSale\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class PointOfSaleController extends EnvironmentController{
    protected function commonRequest(){
        parent::commonRequest();

        $billing = request()?->billing;
        if (isset($billing)){
            $billing['author_type']  ??= $this->global_employee->getMorphClass();   
            $billing['author_id']    ??= $this->global_employee->getKey();   
            $billing['cashier_type'] ??= $this->global_room?->getMorphClass();   
            $billing['cashier_id']   ??= $this->global_room?->getKey();   
        }
        request()->merge([
            'search_reference_type' => ['VisitPatient','PaymentSummary'],
            'billing'               => $billing ?? null
        ]);
    }

    public function index(ViewRequest $request){
        return $this->getPosTransactionPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showPosTransaction();
    }

    public function store(StoreRequest $request){
        return $this->storePosTransaction();
    }

    public function delete(DeleteRequest $request){
        return $this->deletePosTransaction();
    }
}