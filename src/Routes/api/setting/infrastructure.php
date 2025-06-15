<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    AgentController,
    BuildingController,
    ClassRoomController,
    ExternalFacilityController,
    PayerController,
    PosyanduController,
    PustuController,
    RoomController
};

Route::group([
    'prefix' => '/infrastructure',
    'as' => 'infrastructure.'
],function(){
    Route::apiResource('/building',BuildingController::class)->parameters(['building' => 'id']);
    Route::apiResource('/room',RoomController::class)->parameters(['room' => 'id']);
    Route::apiResource('/class-room',ClassRoomController::class)->parameters(['class-room' => 'id']);
    Route::apiResource('/kiosk',BuildingController::class)->parameters(['kiosk' => 'id']);
    Route::apiResource('/agent',AgentController::class)->parameters(['agent' => 'id']);
    Route::apiResource('/payer',PayerController::class)->parameters(['payer' => 'id']);
    Route::apiResource('/company',ClassRoomController::class)->parameters(['company' => 'id']);
    Route::apiResource('/pustu',PustuController::class)->parameters(['pustu' => 'id']);
    Route::apiResource('/posyandu',PosyanduController::class)->parameters(['posyandu' => 'id']);
    Route::apiResource('/external-facility',ExternalFacilityController::class)->parameters(['external-facility' => 'id']);
});
