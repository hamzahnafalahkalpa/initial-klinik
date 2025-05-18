<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    "prefix" => "/manufacturing",
    "as"     => "manufacturing.",
],function() {
    include_once(__DIR__."/manufacturing/product-bom.php");
    include_once(__DIR__."/manufacturing/shbj.php");
    include_once(__DIR__."/manufacturing/material-category.php");
    include_once(__DIR__."/manufacturing/material.php");
});
