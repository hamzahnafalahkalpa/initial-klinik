<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProjectManagement\{
    Project\PurchaseRequest\PurchaseRequestController,
};

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
Route::apiResource('purchase-request',PurchaseRequestController::class)
        ->except('update')->parameters(['purchase-request' => 'id']);