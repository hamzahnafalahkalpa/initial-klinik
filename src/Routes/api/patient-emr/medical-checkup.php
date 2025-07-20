<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\MedicalCheckup\{
    VisitExamination\Assessment\AssessmentController,
    VisitExamination\Examination\ExaminationController,
    VisitExamination\VisitExaminationController,
    MedicalCheckupController
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

Route::apiResource('/medical-checkup',MedicalCheckupController::class)->parameters(['medical-checkup' => 'id']);
Route::group([
    "prefix" => "/medical-checkup/{visit_registration_id}",
    "as"     => "medical-checkup.show.",
],function() {
    Route::apiResource('/visit-examination',VisitExaminationController::class)->parameters(['visit-examination' => 'id']);
    Route::group([
        "prefix" => "/visit-examination/{visit_examination_id}",
        "as"     => "visit-examination.show.",
    ],function() {
        Route::post('/examination',[ExaminationController::class,'store'])->name('examination.store');
        Route::apiResource('/{flag}/assessment',AssessmentController::class)->parameters(['assessment' => 'id'])->only(['store','show','index']);
    });
});
