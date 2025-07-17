<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ItemManagement\Inventory\InventoryController;

Route::apiResource('/inventory',InventoryController::class)->parameters(['inventory' => 'id']);
