<?php

use Illuminate\Support\Facades\Route;

use Projects\Klinik\Concerns\HasInertiaRenderer;

Route::group([
    'prefix' => 'employee-management',
    'alias' => 'employee-management.'
],function(){
    Route::group([
        'prefix' => 'employee',
        'alias' => 'employee.'
    ],function(){
        Route::get('/', fn () => HasInertiaRenderer::inertiaRender('employee-management/employee/Employee'))->name('index');
    });
});