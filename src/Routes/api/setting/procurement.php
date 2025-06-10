<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    SupplierController
};

Route::group([
    'prefix' => '/procurement',
    'as' => 'procurement.'
],function(){
    Route::apiResource('/supplier',SupplierController::class)->parameters(['supplier' => 'id']);
});

