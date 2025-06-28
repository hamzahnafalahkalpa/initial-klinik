<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\PurchaseRequest\PurchaseRequestController;

Route::apiResource('/purchase-request',PurchaseRequestController::class)->parameters(['purchase-request' => 'id']);

