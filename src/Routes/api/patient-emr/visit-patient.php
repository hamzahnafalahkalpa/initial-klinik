<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\VisitPatient\{
    VisitPatientController,
    VisitRegistration\VisitRegistrationController
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

Route::apiResource('/visit-patient',VisitPatientController::class)->parameters(['visit-patient' => 'id']);
Route::group([
    "prefix" => "/visit-patient/{visit_patient_id}",
    "as"     => "visit-patient.show.",
],function() {
    Route::apiResource('/visit-registration',VisitRegistrationController::class)->parameters(['visit-registration' => 'id']);
});
