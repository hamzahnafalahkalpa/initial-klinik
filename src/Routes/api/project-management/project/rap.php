<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProjectManagement\{
    Rap\RapController
};
use Projects\Klinik\Controllers\API\ProjectManagement\Rab\ImportExportRabController;
use Projects\Klinik\Controllers\API\ProjectManagement\Rap\RapItem\RapItemController;

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
Route::post('rap/import',[ImportExportRabController::class,'import'])->name('rap.import');
Route::get('rap/import-template',[ImportExportRabController::class,'template'])->name('rap.template');
Route::apiResource('rap',RapController::class)->parameters(['rap' => 'id']);
Route::group([
    'prefix' => 'rap/{rap_id}',
    'as' => 'rap.'
],function(){
    Route::apiResource('rap-item',RapItemController::class)->parameters(['rap-item' => 'id']);
});