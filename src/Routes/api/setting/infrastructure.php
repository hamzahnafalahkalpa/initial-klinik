<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    AgentController,
    BuildingController,
    ClassRoomController,
    PatientTypeController,
    PatientTypeServiceController,
    PayerController,
    RoomController
};

Route::group([
    'prefix' => '/infrastructure',
    'as' => 'infrastructure.'
],function(){
    Route::apiResource('/building',BuildingController::class)->parameters(['building' => 'id']);
    Route::apiResource('/room',RoomController::class)->parameters(['room' => 'id']);
    Route::apiResource('/class-room',ClassRoomController::class)->parameters(['class-room' => 'id']);
    Route::apiResource('/agent',AgentController::class)->parameters(['agent' => 'id']);
    Route::apiResource('/payer',PayerController::class)->parameters(['payer' => 'id']);
    Route::apiResource('/company',ClassRoomController::class)->parameters(['company' => 'id']);
    Route::apiResource('/patient-type',PatientTypeController::class)->parameters(['patient-type' => 'id']);
    Route::apiResource('/service-type',PatientTypeServiceController::class)->parameters(['service-type' => 'id']);
    Route::apiResource('/medic-service',PatientTypeServiceController::class)->parameters(['medic-service' => 'id']);
    Route::apiResource('/service-cluster',PatientTypeServiceController::class)->parameters(['service-cluster' => 'id']);
});
