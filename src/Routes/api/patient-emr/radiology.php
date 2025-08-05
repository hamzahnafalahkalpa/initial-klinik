<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\PatientEmr\Radiology\{
    VisitExamination\Assessment\AssessmentController,
    VisitExamination\Examination\ExaminationController,
    VisitExamination\VisitExaminationController,
    Referral\ReferralController,
    RadiologyController
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

Route::apiResource('/radiology',RadiologyController::class)->parameters(['radiology' => 'id']);
Route::group([
    "prefix" => "/radiology/{visit_registration_id}",
    "as"     => "radiology.show.",
],function() {
    Route::apiResource('/referral',ReferralController::class)->parameters(['referral' => 'id']);
    Route::apiResource('/visit-examination',VisitExaminationController::class)->parameters(['visit-examination' => 'id']);
    Route::group([
        "prefix" => "/visit-examination/{visit_examination_id}",
        "as"     => "visit-examination.show.",
    ],function() {
        Route::post('/examination',[ExaminationController::class,'store'])->name('examination.store');
        Route::apiResource('/{morph}/assessment',AssessmentController::class)->parameters(['assessment' => 'id'])->only(['store','show','index']);
    });
});
