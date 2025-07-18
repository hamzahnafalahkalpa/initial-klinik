<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProgramActivity\Program\ActivityList\ActivityListController;
use Projects\Klinik\Controllers\API\ProgramActivity\Program\ProgramController;

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

Route::apiResource('/surveillance',SurveillanceController::class)->parameters(['surveillance' => 'id']);