<?php

namespace Projects\Klinik\Controllers\API;

use App\Http\Controllers\ApiController as ControllersApiController;
use Projects\Klinik\Concerns\HasUser;

abstract class ApiController extends ControllersApiController
{
    use HasUser;
}
