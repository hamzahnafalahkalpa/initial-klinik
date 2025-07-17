<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Workspace\WorkspaceController;

Route::group([
    'prefix' => 'navigation',
    'as' => 'navigation.'
],function(){
    include_once __DIR__.'/navigation/notification.php';
    include_once __DIR__.'/navigation/profile.php';
    include_once __DIR__.'/navigation/digital-sign.php';
    include_once __DIR__."/navigation/switching.php";
    include_once __DIR__."/navigation/update-password.php";
});
