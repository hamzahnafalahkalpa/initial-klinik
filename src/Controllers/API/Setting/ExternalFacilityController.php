<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\PuskesmasAsset\Contracts\Schemas\ExternalFacility;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\ExternalFacility\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ExternalFacilityController extends ApiController{
    public function __construct(
        protected ExternalFacility $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewExternalFacilityList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeExternalFacility();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteExternalFacility();
    }
}