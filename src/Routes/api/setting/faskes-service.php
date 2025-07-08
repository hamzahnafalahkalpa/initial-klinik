<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    FormController,
    MedicServiceController,
    PatientTypeController,
    PatientTypeServiceController,
    ServiceClusterController,
    ScreeningController,
    JasaController,
    ServiceLabelController,
};

Route::group([
    'prefix' => '/faskes-service',
    'as' => 'faskes-service.'
],function(){
    Route::apiResource('/patient-type',PatientTypeController::class)->parameters(['patient-type' => 'id']);
    Route::apiResource('/patient-type-service',PatientTypeServiceController::class)->parameters(['patient-type-service' => 'id']);
    Route::apiResource('/medic-service',MedicServiceController::class)->parameters(['medic-service' => 'id']);
    Route::apiResource('/service-cluster',ServiceClusterController::class)->parameters(['service-cluster' => 'id']);
    Route::apiResource('/screening',ScreeningController::class)->parameters(['screening' => 'id']);
    Route::apiResource('/form',FormController::class)->parameters(['form' => 'id']);
    Route::apiResource('/jasa',JasaController::class)->parameters(['jasa' => 'id']);
    Route::apiResource('/service-label',ServiceLabelController::class)->parameters(['service-label' => 'id']);
});
