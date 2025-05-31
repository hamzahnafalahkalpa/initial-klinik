<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\WEB\ACL\RoleController;


Route::group([
    'prefix' => 'acl',
    'alias' => 'acl.'
],function(){
    Route::get('role', [RoleController::class, 'index']);
});