<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    BrandController,
    DosageFormController,
    PackageFormController,
    TherapeuticClassController,
    UsageLocationController,
    UsageRouteController,
    NetUnitController,
    SellingFormController,
    UnitOfMeasureController,
    TrademarkController
};

Route::group([
    'prefix' => '/item-management',
    'as' => 'item-management.'
],function(){
    Route::apiResource('/brand',BrandController::class)->parameters(['brand' => 'id']);
    Route::apiResource('/net-unit',NetUnitController::class)->parameters(['net-unit' => 'id']);
    Route::apiResource('/selling-form',SellingFormController::class)->parameters(['selling-form' => 'id']);
    Route::apiResource('/unit-of-measure',UnitOfMeasureController::class)->parameters(['unit-of-measure' => 'id']);
    Route::group([
        'prefix' => '/medicine',
        'as' => 'medicine.'
    ],function(){
        Route::apiResource('/dosage-form',DosageFormController::class)->parameters(['dosage-form' => 'id']);
        Route::apiResource('/package-form',PackageFormController::class)->parameters(['package-form' => 'id']);
        Route::apiResource('/therapeutic-class',TherapeuticClassController::class)->parameters(['therapeutic-class' => 'id']);
        Route::apiResource('/usage-location',UsageLocationController::class)->parameters(['usage-location' => 'id']);
        Route::apiResource('/usage-route',UsageRouteController::class)->parameters(['usage-route' => 'id']);
        Route::apiResource('/trademark',TrademarkController::class)->parameters(['trademark' => 'id']);
    });
});

