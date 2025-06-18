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
    Route::apiResource('/patient-type-service',PatientTypeServiceController::class)->parameters(['patient-type-service' => 'id']);
    Route::apiResource('/medic-service',MedicServiceController::class)->parameters(['medic-service' => 'id']);
    Route::apiResource('/service-cluster',ServiceClusterController::class)->parameters(['service-cluster' => 'id']);
    Route::apiResource('/jasa',JasaController::class)->parameters(['jasa' => 'id']);
});
