<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\PuskesmasAsset\Contracts\Schemas\Pustu;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Pustu\{
    ViewRequest, StoreRequest, DeleteRequest
};

class PustuController extends ApiController{
    public function __construct(
        protected Pustu $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewPustuList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storePustu();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePustu();
    }
}