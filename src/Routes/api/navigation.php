<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/navigation',
    'as' => 'navigation.'
],function(){
    include __DIR__.'/navigation/menu.php';
    include __DIR__.'/navigation/profile.php';
});