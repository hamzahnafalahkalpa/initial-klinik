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
    'prefix' => "/finance",
    'as'     => "finance."
],function() {
    include_once(__DIR__."/finance/bank.php");
    include_once(__DIR__."/finance/funding.php");
    include_once(__DIR__."/finance/coa.php");
    include_once(__DIR__."/finance/coa-type.php");
    // include_once(__DIR__."/finance/tariff-component.php");
    // include_once(__DIR__."/finance/profession-fee.php");
    // include_once(__DIR__."/finance/master-voucher.php");
});
