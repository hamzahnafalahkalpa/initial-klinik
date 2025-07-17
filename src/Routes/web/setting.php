<?php

use Illuminate\Support\Facades\Route;

use Projects\Klinik\Concerns\HasInertiaRenderer;

Route::group([
    'prefix' => 'setting',
    'alias' => 'setting.'
],function(){
    Route::get('/', fn () => HasInertiaRenderer::inertiaRender('setting/Setting'))->name('index');
});