<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Unicode\{
    AnggaranStuff\AnggaranStuffController
};
use Projects\Klinik\Controllers\API\Unicode\Autolist\AutolistController;

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
Route::apiResource('{morph}/{type}',AutolistController::class)->parameters(['{type}' => 'id']);
