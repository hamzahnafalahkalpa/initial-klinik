<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    MedicServiceController,
    PatientTypeController,
    PatientTypeServiceController,
    ServiceClusterController,
    JasaController,
};

Route::group([
    'prefix' => '/faskes-service',
    'as' => 'faskes-service.'
],function(){
    Route::apiResource('/patient-type',PatientTypeController::class)->parameters(['patient-type' => 'id']);
    Route::apiResource('/service-type',PatientTypeServiceController::class)->parameters(['service-type' => 'id']);
    Route::apiResource('/medical-service',MedicServiceController::class)->parameters(['medical-service' => 'id']);
    Route::apiResource('/service-cluster',ServiceClusterController::class)->parameters(['service-cluster' => 'id']);
    Route::apiResource('/jasa',JasaController::class)->parameters(['jasa' => 'id']);
});
