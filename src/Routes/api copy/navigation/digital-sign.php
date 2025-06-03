<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Navigation\DigitalSign\DigitalSignController;

Route::apiResource('digital-sign',DigitalSignController::class)
    ->only('index','store')->parameters(['digital-sign' => 'id']);