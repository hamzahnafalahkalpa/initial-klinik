<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\WEB\HomeController;

Route::get('dashboard', [HomeController::class,'index'])->name('dashboard');