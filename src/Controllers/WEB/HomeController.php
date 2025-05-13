<?php

namespace Projects\Klinik\Controllers\WEB;

use Inertia\Inertia;
use Projects\Klinik\Controllers\Controller;

class HomeController extends Controller{
    public function index(){
        return $this->inertiaRender('auth/Login');
        // return Inertia::render($this->i);

        // $this->inertiaPage('usermodule','Auth/Login'), [
        //         'canLogin'       => Route::has('login'),
        //         'canRegister'    => Route::has('register'),
        //         'laravelVersion' => Application::VERSION,
        //         'phpVersion'     => PHP_VERSION,
        //     ]
    }
}