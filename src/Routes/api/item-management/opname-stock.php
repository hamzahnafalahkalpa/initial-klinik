<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ItemManagement\OpnameStock\OpnameStockController;

Route::apiResource('/opname-stock',OpnameStockController::class)->parameters(['opname-stock' => 'id']);

