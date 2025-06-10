<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    ProfessionController,
    OccupationController,
    EmployeeTypeController
};

Route::group([
    'prefix' => '/employee-management',
    'as' => 'employee-management.'
],function(){
    Route::apiResource('/profession',ProfessionController::class)->parameters(['profession' => 'id']);
    Route::apiResource('/occupation',OccupationController::class)->parameters(['occupation' => 'id']);
    Route::apiResource('/employee-type',EmployeeTypeController::class)->parameters(['employee-type' => 'id']);   
    Route::apiResource('/shift',ProfessionController::class)->parameters(['shift' => 'id']);
});

