<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    ProgramCategoryController,
};

Route::group([
    'prefix' => '/program-activity',
    'as' => 'program-activity.'
],function(){
    Route::apiResource('/program-category',ProgramCategoryController::class)->parameters(['program-category' => 'id']);
});
