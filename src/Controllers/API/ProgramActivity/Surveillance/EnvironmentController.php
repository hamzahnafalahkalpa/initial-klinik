<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Surveillance;

use Hanafalah\PuskesmasAsset\Contracts\Schemas\Surveillance;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController{
    public function __construct(
        protected Surveillance $__schema
    ){
        parent::__construct();
    }
}