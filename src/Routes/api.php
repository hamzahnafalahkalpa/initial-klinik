<?php

use Hanafalah\ApiHelper\Facades\ApiAccess as FacadesApiAccess;
use Hanafalah\ApiHelper\Middlewares\ApiAccess;
use Hanafalah\LaravelSupport\Facades\LaravelSupport;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [ApiAccess::class],
    'as' => 'api.'
],function(){
    LaravelSupport::callRoutes(__DIR__.'/api');
});