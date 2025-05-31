<?php

namespace Projects\Klinik\Controllers\WEB\ACL;

use Projects\Klinik\Controllers\Controller;
use Projects\Klinik\Requests\WEB\ACL\Role\{ViewRequest};

class RoleController extends Controller{
    public function index(ViewRequest $request){
        return $this->inertiaRender('acl/role/Index');
    }
}