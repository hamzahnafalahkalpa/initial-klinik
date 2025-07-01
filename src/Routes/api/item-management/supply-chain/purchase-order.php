<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\PurchaseOrder\PurchaseOrderController;
use Projects\Klinik\Controllers\API\ItemManagement\SupplyChain\ReceiveOrder\ReceiveOrderController;

Route::apiResource('/purchase-order',PurchaseOrderController::class)->parameters(['purchase-order' => 'id']);
Route::group([
    'prefix' => '/purchase-order/{purchase_order_id}',
    'as' => 'purchase-order.show.'
],function(){
    Route::apiResource('/receive-order',ReceiveOrderController::class)->parameters(['receive-order' => 'id']);
});
