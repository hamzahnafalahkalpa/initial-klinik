<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\Purchasing\PurchasingController;

Route::apiResource('/purchasing',PurchasingController::class)->parameters(['purchasing' => 'id']);

