<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ACL\RoleController;

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
Route::apiResource('role',RoleController::class)
      ->only('index','show','store','destroy')
      ->parameters(['role' => 'id']);
