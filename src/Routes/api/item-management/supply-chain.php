<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/supply-chain',
    'as' => 'supply-chain.',
],function(){
    include __DIR__.'/supply-chain/purchase-request.php';
    include __DIR__.'/supply-chain/purchasing.php';
    include __DIR__.'/supply-chain/receive-order.php';
});

