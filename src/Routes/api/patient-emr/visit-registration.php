<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\VisitRegistrationController;

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

Route::apiResource('/visit-registration',VisitRegistrationController::class)->parameters(['visit-registration' => 'id']);
Route::group([
    "prefix" => "/visit-registration/{visit_registration_id}",
    "as"     => "visit-registration.show.",
],function() {
    // Route::apiResource('/visit-examination',VisitExaminationController::class)->parameters(['visit-examination' => 'id']);
    // Route::apiResource('/visit-examination/examination/{morph}',ExaminationController::class)->parameters(['visit-examination' => 'id']);
});
