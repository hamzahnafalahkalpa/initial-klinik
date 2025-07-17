<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Component\TariffComponent\TariffComponentController;
use Projects\Klinik\Controllers\API\Component\TariffComponent\TariffServiceComponentController;

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
Route::apiResource('tariff-component/service/{flag}',TariffServiceComponentController::class)->only(['index']);
Route::apiResource('tariff-component',TariffComponentController::class)->parameters(['tariff-component' => 'id']);
