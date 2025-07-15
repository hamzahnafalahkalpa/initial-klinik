<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Navigation\AbsenceRequest\AbsenceRequestController;

Route::apiResource('absence-request',AbsenceRequestController::class)
    ->only('store')->parameters(['absence-request' => 'id']);