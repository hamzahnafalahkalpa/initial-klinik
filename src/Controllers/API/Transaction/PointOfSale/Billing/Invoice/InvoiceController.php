<?php

namespace Projects\Klinik\Controllers\API\Transaction\PointOfSale\Billing\Invoice;

use Projects\Klinik\Requests\API\Transaction\PointOfSale\Billing\Invoice\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};
use Projects\Klinik\Controllers\API\Transaction\Invoice\EnvironmentController;

class InvoiceController extends EnvironmentController{
    protected function commonConditional($query){
        $query->whereNull('reported_at');
    }

    public function index(ViewRequest $request){
        return $this->getInvoiceList();
    }

    public function show(ShowRequest $request){
        return $this->showInvoice();
    }

    public function store(StoreRequest $request){
        return $this->storeInvoice();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteInvoice();
    }
}