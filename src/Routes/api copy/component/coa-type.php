<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Finance\CoaType\CoaTypeController;

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
Route::apiResource('coa-type',CoaTypeController::class)->only('index','store','destroy')->parameters(['coa-type' => 'id']);