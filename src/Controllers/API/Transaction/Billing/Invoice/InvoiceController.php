<?php

namespace Projects\Klinik\Controllers\API\Transaction\Billing\Invoice;

use Projects\Klinik\Requests\API\Transaction\Invoice\{
    ViewRequest, ShowRequest
};
use Projects\Klinik\Controllers\API\Transaction\Invoice\EnvironmentController;

class InvoiceController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->getInvoiceList();
    }

    public function show(ShowRequest $request){
        return $this->showInvoice();
    }
}