<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\ProjectManagement\{
    Project\ProjectController,
};

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
Route::apiResource('project',ProjectController::class)->parameters(['project' => 'id']);
Route::group([
    'prefix' => "/project/{project_id}",
    'as'     => "project."
],function(){
    include_once __DIR__.'/project/rab.php';
    include_once __DIR__.'/project/rap.php';
    include_once __DIR__.'/project/support.php';
    include_once __DIR__.'/project/item.php';
    include_once __DIR__.'/project/purchase-request.php';
    include_once __DIR__.'/project/purchase-order.php';
    include_once __DIR__.'/project/receive-order.php';
    include_once __DIR__.'/project/purchasing.php';
    include_once __DIR__.'/project/work-order.php';
});