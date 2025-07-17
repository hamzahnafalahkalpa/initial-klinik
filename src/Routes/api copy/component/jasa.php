<?php

use Illuminate\Support\Facades\Route;

use Projects\Klinik\Controllers\API\Component\Jasa\JasaController;

Route::apiResource('jasa',JasaController::class)
    ->only('index','store','destroy')
    ->parameters(['jasa' => 'id']);