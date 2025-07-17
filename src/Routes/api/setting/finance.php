<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    BankController,
    CoaController,
    FundingController,
    AccountGroupController,
    CoaTypeController,
    PaymentMethodController,
    TariffComponentController
};

Route::group([
    'prefix' => '/finance',
    'as' => 'finance.'
],function(){
    Route::apiResource('/bank',BankController::class)->parameters(['bank' => 'id']);
    Route::apiResource('/funding',FundingController::class)->parameters(['funding' => 'id']);
    Route::apiResource('/coa',CoaController::class)->parameters(['coa' => 'id']);
    Route::apiResource('/coa-type',CoaTypeController::class)->parameters(['coa-type' => 'id']);
    Route::apiResource('/account-group',AccountGroupController::class)->parameters(['account-group' => 'id']);
    Route::apiResource('/payment-method',PaymentMethodController::class)->parameters(['payment-method' => 'id']);
    Route::apiResource('/tariff-component',TariffComponentController::class)->parameters(['tariff-component' => 'id']);
});
