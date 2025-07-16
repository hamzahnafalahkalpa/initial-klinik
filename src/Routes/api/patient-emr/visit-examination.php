<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\VisitExaminationController;

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

Route::apiResource('/visit-examination',VisitExaminationController::class)->parameters(['visit-examination' => 'id']);
Route::group([
    "prefix" => "/visit-examination/{visit_examination_id}",
    "as"     => "visit-examination.show.",
],function() {
    // Route::apiResource('/visit-examination',VisitExaminationController::class)->parameters(['visit-examination' => 'id']);
    // Route::apiResource('/visit-examination/examination/{morph}',ExaminationController::class)->parameters(['visit-examination' => 'id']);
});
