<?php

namespace Projects\Klinik\Controllers;

use App\Http\Controllers\Controller as MainController;
use Inertia\Inertia;
use Projects\Klinik\Concerns\HasUser;
use Illuminate\Support\Str;

abstract class Controller extends MainController
{
    use HasUser;

    protected function inertiaRender(string $path, ?array $options = []){
        return Inertia::render($path,$options);
    }
}
