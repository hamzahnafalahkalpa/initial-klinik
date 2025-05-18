<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Client;

use Hanafalah\ModuleProject\Contracts\Schemas\Customer\Client;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Client\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ClientController extends ApiController
{
    public function __construct(protected Client $__client_schema){}

    public function index(ViewRequest $request){
        request()->merge([
            'search_name'  => request()->search_value,
            'search_value' => null
        ]);
        return $this->__client_schema->viewClientList();
    }

    public function show(ShowRequest $request){
        return $this->__client_schema->showClient();
    }

    public function store(StoreRequest $request){
        return $this->__client_schema->storeClient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__client_schema->deleteClient();
    }
}