<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Menu\MenuController;

Route::get('/menu',[MenuController::class,'index'])->name('menus.index');