<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\Patient\PatientController;
use Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitPatient\VisitPatientController;

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
});