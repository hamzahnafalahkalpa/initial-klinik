<?php

namespace Projects\Klinik\Controllers;

use App\Http\Controllers\Controller as MainController;
use Inertia\Inertia;
use Projects\Klinik\Concerns\HasInertiaRenderer;
use Projects\Klinik\Concerns\HasUser;

abstract class Controller extends MainController
{
    use HasUser, HasInertiaRenderer;
}
