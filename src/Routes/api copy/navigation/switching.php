<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Navigation\Switching\SwitchingController;

Route::apiResource('switching/{type}',SwitchingController::class)->only('update')
    ->parameters(['{type}' => 'id']);