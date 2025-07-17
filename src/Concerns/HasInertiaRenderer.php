<?php

namespace Projects\Klinik\Concerns;

use Inertia\Inertia;

trait HasInertiaRenderer
{
    public static function inertiaRender(string $path, ?array $options = []){
        return Inertia::render($path,$options);
    }
}