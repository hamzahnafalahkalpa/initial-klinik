<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\Patient\PatientController;
use Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitPatient\VisitPatientController;
use Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitExamination\Examination\ExaminationController;
use Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitRegistration\VisitRegistrationController;

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

Route::apiResource('/patient',PatientController::class)->parameters(['patient' => 'id']);
Route::group([
    "prefix" => "/patient/{patient_id}",
    "as"     => "patient.show.",
],function() {
    Route::apiResource('/visit-patient',VisitPatientController::class)->parameters(['visit-patient' => 'id']);
    Route::group([
        "prefix" => "/visit-patient/{visit_patient_id}",
        "as"     => "visit-patient.show.",
    ],function() {
        Route::apiResource('/visit-registration',VisitRegistrationController::class)->parameters(['visit-registration' => 'id']);
    });
    Route::apiResource('/visit-registration',VisitRegistrationController::class)->parameters(['visit-registration' => 'id']);
    Route::group([
        "prefix" => "/visit-registration/{visit_registration_id}",
        "as"     => "visit-registration.show.",
    ],function() {
        // Route::apiResource('/visit-examination',VisitExaminationController::class)->parameters(['visit-examination' => 'id']);
        // Route::apiResource('/visit-examination/examination/{morph}',ExaminationController::class)->parameters(['visit-examination' => 'id']);
    });
});
