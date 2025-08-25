<?php

namespace Projects\Klinik\Controllers\API\Transaction\Billing;

use Projects\Klinik\Requests\API\Transaction\Billing\{
    ViewRequest, ShowRequest
};

class BillingController extends EnvironmentController{
    protected function commonConditional($query){
        $query->whereNotNull('reported_at');
    }

    public function index(ViewRequest $request){
        return $this->getBillingList();
    }

    public function show(ShowRequest $request){
        return $this->showBilling();
    }
}