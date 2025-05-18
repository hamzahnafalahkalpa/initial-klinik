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
    "prefix" => "/project-management",
    "as"     => "project-management.",
],function() {
    include_once(__DIR__."/project-management/client.php");
    include_once(__DIR__."/project-management/client-type.php");
    include_once(__DIR__."/project-management/manufacturing.php");
    include_once(__DIR__."/project-management/execution-type.php");
    include_once(__DIR__."/project-management/subcon.php");
    include_once(__DIR__."/project-management/project.php");
    include_once(__DIR__."/project-management/rab.php");
    include_once __DIR__.'/project-management/project-category.php';
    include_once(__DIR__."/project-management/document-type.php");
});