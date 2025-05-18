<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\ClientType;

use Hanafalah\ModuleProject\Contracts\Schemas\Customer\ClientType;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\ClientType\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ClientTypeController extends ApiController
{
    public function __construct(protected ClientType $__client_type_schema){}

    public function index(ViewRequest $request){
        request()->merge([
            'search_name'  => request()->search_value,
            'search_value' => null
        ]);
        return $this->__client_type_schema->viewClientTypeList();
    }

    public function store(StoreRequest $request){
        return $this->__client_type_schema->storeClientType();
    }

    public function destroy(DeleteRequest $request){
        return $this->__client_type_schema->deleteClientType();
    }
}