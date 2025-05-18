<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProjectManagement\{
    Rab\RabController,
    Rap\RapController
};
use Projects\Klinik\Controllers\API\ProjectManagement\Rab\ImportExportRabController;

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
Route::post('rab/import',[ImportExportRabController::class,'import'])->name('rab.import');
Route::get('rab/import-template',[ImportExportRabController::class,'template'])->name('rab.template');
Route::apiResource('rab',RabController::class)
    ->only('show','store','destroy')
    ->parameters(['rab' => 'id']);

Route::group([
    'prefix' => 'rab/{rab_id}',
    'as' => 'rab.'
],function(){
    include_once __DIR__.'/rab/rab-work-list.php';
    Route::get('rab/:id/export',[ImportExportRabController::class,'export'])->name('rab.export');
    Route::apiResource('rap',RapController::class)->parameters(['rap' => 'id']);
});