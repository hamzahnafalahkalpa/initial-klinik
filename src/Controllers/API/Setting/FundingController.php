<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleFunding\Contracts\Schemas\Funding;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Funding\{
    ViewRequest, StoreRequest, DeleteRequest
};

class FundingController extends ApiController{
    public function __construct(
        protected Funding $__funding_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__funding_schema->viewFundingList();
    }

    public function store(StoreRequest $request){
        return $this->__funding_schema->storeFunding();
    }

    public function destroy(DeleteRequest $request){
        return $this->__funding_schema->deleteFunding();
    }
}