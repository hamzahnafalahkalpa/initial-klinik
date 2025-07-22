<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ExampleModel\ExampleModelController;

Route::apiResource('example-model', ExampleModelController::class)
    ->parameters(['example-model' => 'id']);