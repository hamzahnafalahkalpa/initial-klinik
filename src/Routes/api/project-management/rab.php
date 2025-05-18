<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProjectManagement\{
    Rab\RabController,
    Rab\ImportExportRabController
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
Route::apiResource('rab',RabController::class)->parameters(['rab' => 'id']);
Route::group([
    'prefix' => 'rab/{rab_id}',
    'as' => 'rab.'
],function(){
    include_once __DIR__.'/rab/rap.php';
    include_once __DIR__.'/rab/rab-work-list.php';
});