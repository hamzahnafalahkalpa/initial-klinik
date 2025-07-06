<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    MedicalTreatmentController
};

Route::group([
    'prefix' => '/treatment',
    'as' => 'treatment.'
],function(){
    Route::apiResource('/medical-treatment',MedicalTreatmentController::class)->parameters(['medical-treatment' => 'id']);
    Route::apiResource('/lab-treatment',MedicalTreatmentController::class)->parameters(['lab-treatment' => 'id']);
    Route::apiResource('/radiology-treatment',MedicalTreatmentController::class)->parameters(['radiology-treatment' => 'id']);
});

