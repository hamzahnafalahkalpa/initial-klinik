<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\PuskesmasAsset\Contracts\Schemas\Posyandu;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Posyandu\{
    ViewRequest, StoreRequest, DeleteRequest
};

class PosyanduController extends ApiController{
    public function __construct(
        protected Posyandu $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewPosyanduList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storePosyandu();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePosyandu();
    }
}