<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    SupplierController
};

Route::group([
    'prefix' => '/item-management',
    'as' => 'item-management.'
],function(){
    Route::apiResource('/brand',SupplierController::class)->parameters(['brand' => 'id']);
    Route::apiResource('/unit-of-measure',SupplierController::class)->parameters(['unit-of-measure' => 'id']);
    Route::apiResource('/dosage-form',SupplierController::class)->parameters(['dosage-form' => 'id']);
    Route::apiResource('/therapeutic-class',SupplierController::class)->parameters(['therapeutic-class' => 'id']);
    Route::apiResource('/usage-route',SupplierController::class)->parameters(['usage-route' => 'id']);
    Route::apiResource('/selling-form',SupplierController::class)->parameters(['selling-form' => 'id']);
    Route::apiResource('/package-form',SupplierController::class)->parameters(['package-form' => 'id']);
});

