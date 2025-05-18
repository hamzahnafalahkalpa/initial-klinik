<?php

use Hanafalah\ApiHelper\Middlewares\ApiAccess;
use Hanafalah\LaravelSupport\Facades\LaravelSupport;
use Illuminate\Support\Facades\Route;

Route::middleware([
    ApiAccess::class
])->group(function(){
    LaravelSupport::callRoutes(__DIR__.'/api');
});

