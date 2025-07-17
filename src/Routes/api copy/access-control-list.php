<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ACL\Role\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    "prefix" => "/acl",
    "as"     => "acl."
],function() {
    include_once(__DIR__."/acl/role.php");
    include_once(__DIR__."/acl/permission.php");
});