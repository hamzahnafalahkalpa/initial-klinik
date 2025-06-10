<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\LaravelPermission\Contracts\Schemas\Menu;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Setting\{
    ViewRequest
};

class SettingController extends ApiController{
    public function __construct(
        protected Menu $__schema
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        $this->userAttempt();
        request()->merge([
            'role_id'      => $this->global_user_reference->prop_role['id'],
            'is_module'    => true
        ]);
        return $this->__schema->conditionals(function($query){
            $query->whereHas('parent',function($query){
                $query->alias('api.setting.index');
            });
        })->viewMenuList();
    }
}