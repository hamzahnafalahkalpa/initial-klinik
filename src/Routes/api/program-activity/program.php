<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProgramActivity\Program\{
    ActivityList\Surveillance\SurveillanceController,
    ActivityList\ActivityListController,
    ProgramController
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

Route::apiResource('/program',ProgramController::class)->parameters(['program' => 'id']);
Route::group([
    'prefix' => 'program/{program_id}',
    'as' => 'program.show.'
],function(){
    Route::apiResource('/activity-list',ActivityListController::class)->parameters(['activity-list' => 'id']);
    Route::group([
        'prefix' => 'activity-list/{activity_list_id}',
        'as' => 'activity-list.show.'
    ],function(){
        Route::apiResource('/surveillance',SurveillanceController::class)->parameters(['surveillance' => 'id']);
    });
});