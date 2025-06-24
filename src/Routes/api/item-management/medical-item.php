<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/medical-item',MedicalItemController::class)->parameters(['medical-item' => 'id']);

