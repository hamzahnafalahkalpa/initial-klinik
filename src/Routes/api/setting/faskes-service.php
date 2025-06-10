<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    PatientTypeController,
    PatientTypeServiceController,
    ServiceClusterController,
};

Route::group([
    'prefix' => '/faskes-service',
    'as' => 'faskes-service.'
],function(){
    Route::apiResource('/patient-type',PatientTypeController::class)->parameters(['patient-type' => 'id']);
    Route::apiResource('/service-type',PatientTypeServiceController::class)->parameters(['service-type' => 'id']);
    Route::apiResource('/medic-service',PatientTypeServiceController::class)->parameters(['medic-service' => 'id']);
    Route::apiResource('/service-cluster',ServiceClusterController::class)->parameters(['service-cluster' => 'id']);
});
