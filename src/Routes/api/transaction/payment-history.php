<?php

use Illuminate\Support\Facades\Route;

use Projects\Klinik\Controllers\API\Transaction\PaymentHistory\PaymentHistoryController;
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

Route::apiResource('/payment-history',PaymentHistoryController::class)->parameters(['payment-history' => 'id']);