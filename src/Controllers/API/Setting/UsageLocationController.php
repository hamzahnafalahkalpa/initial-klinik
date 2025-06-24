<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleMedicalItem\Contracts\Schemas\UsageLocation;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\UsageLocation\{
    ViewRequest, StoreRequest, DeleteRequest
};
class UsageLocationController extends ApiController{
    public function __construct(
        protected UsageLocation $__usagelocation_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__usagelocation_schema->viewUsageLocationList();
    }

    public function store(StoreRequest $request){
        return $this->__usagelocation_schema->storeUsageLocation();
    }

    public function destroy(DeleteRequest $request){
        return $this->__usagelocation_schema->deleteUsageLocation();
    }
}