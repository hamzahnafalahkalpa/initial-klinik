<?php

namespace Projects\Klinik\Controllers\API\Transaction\PointOfSale;

use Projects\Klinik\Controllers\API\Transaction\PointOfSale\EnvironmentController;
use Projects\Klinik\Requests\API\Transaction\PointOfSale\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class PointOfSaleController extends EnvironmentController{
    protected function commonRequest(){
        parent::commonRequest();
        request()->merge([
            'search_reference_type' => ['VisitPatient','PaymentSummary']
        ]);
    }

    public function index(ViewRequest $request){
        return $this->getTransactionPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showTransaction();
    }

    public function store(StoreRequest $request){
        return $this->storeTransaction();
    }

    public function delete(DeleteRequest $request){
        return $this->deleteTransaction();
    }
}