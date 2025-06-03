<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProfessionManagement\Profession\ProfessionController;

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
Route::apiResource('profession-fee',ProfessionController::class)->only('store')->parameters(['profession-fee' => 'id']);
