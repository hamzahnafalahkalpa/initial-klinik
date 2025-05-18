<?php

use Illuminate\Support\Facades\Route;

use Projects\Klinik\Controllers\API\EmployeeManagement\Shift\ShiftController;

Route::apiResource('shift',ShiftController::class)
    ->only('index','store','destroy')
    ->parameters(['shift' => 'id']);