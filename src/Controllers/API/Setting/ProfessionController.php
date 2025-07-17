<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleProfession\Contracts\Schemas\Profession;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\Profession\{
    ViewRequest, StoreRequest, DeleteRequest
};

class ProfessionController extends ApiController{
    public function __construct(
        protected Profession $__schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewProfessionList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeProfession();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteProfession();
    }
}