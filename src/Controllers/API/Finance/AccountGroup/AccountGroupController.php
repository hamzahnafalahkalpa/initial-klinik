<?php

namespace Projects\Klinik\Controllers\API\Finance\AccountGroup;

use Hanafalah\ModulePayment\Contracts\Schemas\AccountGroup;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Finance\AccountGroup\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class AccountGroupController extends ApiController{
    public function __construct(
        protected AccountGroup $__account_group_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__account_group_schema->viewAccountGroupList();
    }

    public function show(ShowRequest $request){
        return $this->__account_group_schema->viewAccountGroupList();
    }

    public function store(StoreRequest $request){
        if (isset(request()->coas) && count(request()->coas) > 0){
            $coas = request()->coas;
            foreach ($coas as &$coa) $coa['flag'] = 'Coa';
            request()->merge([
                'coas' => $coas
            ]);
        }
        return $this->__account_group_schema->storeAccountGroup();
    }

    public function destroy(DeleteRequest $request){
        return $this->__account_group_schema->deleteAccountGroup();
    }
}