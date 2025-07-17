<?php

use Illuminate\Support\Facades\Route;

use Projects\Klinik\Controllers\API\EmployeeManagement\EmployeeType\EmployeeTypeController;

Route::apiResource('employee-type',EmployeeTypeController::class)
    ->only('index','store','destroy')
    ->parameters(['employee-type' => 'id']);