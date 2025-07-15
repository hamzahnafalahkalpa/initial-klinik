<?php

use Projects\Klinik\Controllers\API\Navigation\Attendence\AttendenceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('attendence',AttendenceController::class)
    ->only('store')->parameters(['attendence' => 'id']);