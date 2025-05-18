<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Finance\AccountGroup\AccountGroupController;

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
Route::apiResource('account-group',AccountGroupController::class)->parameters(['account-group' => 'id']);