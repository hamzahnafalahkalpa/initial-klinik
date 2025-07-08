<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\Examination\{
    AllergyStuffController,
    GcsStuffController,
    MonitoringCategoryController,
    PhysicalExaminationStuffController,
    TriageStuffController,
    VitalSignStuffController
};

Route::group([
    'prefix' => '/patient-emr',
    'as' => 'patient-emr.'
],function(){
    Route::group([
        'prefix' => '/examination',
        'as' => 'examination.'
    ],function(){
        Route::apiResource('/monitoring-category',MonitoringCategoryController::class)->parameters(['monitoring-category' => 'id']);
        Route::apiResource('/physical-examination-stuff',PhysicalExaminationStuffController::class)->parameters(['physical-examination-stuff' => 'id']);
        Route::apiResource('/allergy-stuff',AllergyStuffController::class)->parameters(['allergy-stuff' => 'id']);
        Route::apiResource('/gcs-stuff',GcsStuffController::class)->parameters(['gcs-stuff' => 'id']);
        Route::apiResource('/triage-stuff',TriageStuffController::class)->parameters(['triage-stuff' => 'id']);
        Route::apiResource('/vital-sign-stuff',VitalSignStuffController::class)->parameters(['vital-sign-stuff' => 'id']);
    });
});

