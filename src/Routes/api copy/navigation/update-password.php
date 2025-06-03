<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Navigation\Auth\UpdatePasswordController;

Route::apiResource('update-password',UpdatePasswordController::class)->only('store');