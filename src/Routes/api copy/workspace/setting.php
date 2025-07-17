<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Workspace\Workspace\WorkspaceController;

Route::apiResource('setting',WorkspaceController::class)->only('show','store')->parameters(['setting' => 'uuid']);