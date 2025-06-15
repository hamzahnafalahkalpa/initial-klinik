<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/inventory',InventoryController::class)->parameters(['inventory' => 'id']);
