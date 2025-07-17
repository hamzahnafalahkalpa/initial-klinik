<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\EmployeeManagement\JobDesk\JobDeskController;

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
Route::apiResource('job-desk', JobDeskController::class)
     ->only('index','store','destroy')
     ->parameters(['job-desk' => 'id']);