<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\ReceiveOrder\ReceiveOrderController;

Route::apiResource('/receive-order',ReceiveOrderController::class)->parameters(['receive-order' => 'id']);

