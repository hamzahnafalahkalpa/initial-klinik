<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/opname-stock',OpnameStockController::class)->parameters(['opname-stock' => 'id']);

