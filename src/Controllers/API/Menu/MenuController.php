<?php

namespace Projects\Klinik\Controllers\API\Menu;

use Hanafalah\LaravelPermission\Contracts\Schemas\Menu;
use Projects\Klinik\Controllers\API\ApiController;

class MenuController extends ApiController{
    public function __construct(
        protected Menu $__schema_menu
    ){
        parent::__construct();
    }

    public function index(){
        $this->userAttempt();
        request()->merge([
            'role_id' => $this->global_user_reference->prop_role['id']
        ]);
        return $this->__schema_menu->viewMenuList();
    }
}