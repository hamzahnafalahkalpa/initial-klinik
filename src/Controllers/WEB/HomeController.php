<?php

namespace Projects\Klinik\Controllers\WEB;

use Projects\Klinik\Controllers\Controller;

class HomeController extends Controller{
    public function index(){
        return $this->inertiaRender('Dashboard');
    }
}