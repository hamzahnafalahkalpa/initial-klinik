<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    AnatomicalPathologyController,
    ClinicalPathologyController,
    MedicalTreatmentController,
    RadiologyController,
    SampleController
};

Route::group([
    'prefix' => '/treatment',
    'as' => 'treatment.'
],function(){
    Route::apiResource('/sample',SampleController::class)->parameters(['sample' => 'id']);
    Route::apiResource('/medical-treatment',MedicalTreatmentController::class)->parameters(['medical-treatment' => 'id']);
    Route::apiResource('/clinical-pathology',ClinicalPathologyController::class)->parameters(['clinical-pathology' => 'id']);
    Route::apiResource('/anatomical-pathology',AnatomicalPathologyController::class)->parameters(['anatomical-pathology' => 'id']);
    Route::apiResource('/radiology',RadiologyController::class)->parameters(['radiology' => 'id']);
});

