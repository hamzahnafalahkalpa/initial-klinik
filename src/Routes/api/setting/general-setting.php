<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Setting\{
    EncodingController,
    WorkspaceController
};

Route::group([
    'prefix' => '/general-setting',
    'as' => 'general-setting.'
],function(){
    Route::apiResource('/workspace',WorkspaceController::class)->parameters(['workspace' => 'uuid']);
    Route::apiResource('/encoding',EncodingController::class)->parameters(['encoding' => 'id']);
});
