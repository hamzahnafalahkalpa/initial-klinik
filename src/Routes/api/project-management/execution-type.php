<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProjectManagement\{
    ExecutionType\ExecutionTypeController
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
Route::apiResource('execution-type',ExecutionTypeController::class)->parameters(['execution-type' => 'id']);
