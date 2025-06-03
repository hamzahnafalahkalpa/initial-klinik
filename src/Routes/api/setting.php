<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    RoleController,
    BankController,
    BuildingController,
    ClassRoomController,
    CoaController,
    EmployeeTypeController,
    SupplierController,
    EncodingController,
    FundingController,
    OccupationController,
    RoomController
};
use Projects\Klinik\Controllers\WEB\Setting\SettingController;

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
Route::group([
    'prefix' => 'setting',
    'as' => 'setting.'
],function(){
    Route::apiResource('/role',RoleController::class)->parameters(['role' => 'id']);
    Route::apiResource('/bank',BankController::class)->parameters(['bank' => 'id']);
    Route::apiResource('/coa',CoaController::class)->parameters(['coa' => 'id']);
    Route::apiResource('/supplier',SupplierController::class)->parameters(['supplier' => 'id']);
    Route::apiResource('/encoding',EncodingController::class)->parameters(['encoding' => 'id']);
    Route::apiResource('/funding',FundingController::class)->parameters(['funding' => 'id']);
    Route::apiResource('/occupation',OccupationController::class)->parameters(['occupation' => 'id']);
    Route::apiResource('/employee-type',EmployeeTypeController::class)->parameters(['employee-type' => 'id']);
    Route::apiResource('/building',BuildingController::class)->parameters(['building' => 'id']);
    Route::apiResource('/room',RoomController::class)->parameters(['room' => 'id']);
    Route::apiResource('/class-room',ClassRoomController::class)->parameters(['class-room' => 'id']);
    // Route::apiResource('/tariff-component',TariffComponentController::class);
});