<?php

namespace Projects\Klinik\Controllers\API\ACL;

use Hanafalah\LaravelPermission\Contracts\Schemas\Permission;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ACL\Role\{
    ViewRequest
};

class PermissionController extends ApiController{
    public function __construct(
        protected Permission $__permission_schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__permission_schema->viewPermissionList();
    }
}