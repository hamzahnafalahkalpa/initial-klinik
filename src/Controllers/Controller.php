<?php

namespace Projects\Klinik\Controllers;

use App\Http\Controllers\Controller as MainController;
use Inertia\Inertia;
use Projects\Klinik\Concerns\HasUser;

abstract class Controller extends MainController
{
    use HasUser;

    protected function inertiaRender(string $path, ?array $options = []){
        $page_path = '~'.klinik_path().DIRECTORY_SEPARATOR.config('klinik.libs.resources').DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.$path;
        return Inertia::render($page_path,$options);
    }
}
