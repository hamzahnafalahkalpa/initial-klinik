<?php

namespace Projects\Klinik\Controllers\API\Transaction\Refund;

use Projects\Klinik\Requests\API\Transaction\Refund\{
    ViewRequest, ShowRequest
};

class RefundController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->getRefundPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showRefund();
    }
}