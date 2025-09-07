<?php

namespace Projects\Klinik\Controllers\API\Transaction\Deposit;

use Projects\Klinik\Requests\API\Transaction\Deposit\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class DepositController extends EnvironmentController{
    protected function commonConditional($query){
    }

    public function index(ViewRequest $request){
        return $this->getDepositPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showDeposit();
    }

    public function store(StoreRequest $request){
        return $this->storeDeposit();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteDeposit();
    }
}