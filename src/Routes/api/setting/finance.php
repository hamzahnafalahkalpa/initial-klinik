<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    BankController,
    CoaController,
    FundingController,
};

Route::group([
    'prefix' => '/finance',
    'as' => 'finance.'
],function(){
    Route::apiResource('/bank',BankController::class)->parameters(['bank' => 'id']);
    Route::apiResource('/funding',FundingController::class)->parameters(['funding' => 'id']);
    Route::apiResource('/coa',CoaController::class)->parameters(['coa' => 'id']);
    // Route::apiResource('/tariff-component',TariffComponentController::class);
});
