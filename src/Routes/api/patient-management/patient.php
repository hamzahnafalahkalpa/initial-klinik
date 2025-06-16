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

Route::apiResource('/patient',PatientController::class)->parameters(['patient' => 'id']);
Route::group([
    "prefix" => "/patient",
    "as"     => "patient.",
],function() {
});