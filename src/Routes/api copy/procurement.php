<?php

use Illuminate\Support\Facades\Route;

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
    'prefix' => "/procurement",
    'as'     => "procurement."
],function() {
    include_once(__DIR__."/procurement/supplier.php");
    include_once(__DIR__."/procurement/purchase-request.php");
    include_once(__DIR__."/procurement/purchasing.php");
    include_once(__DIR__."/procurement/work-order.php");
});