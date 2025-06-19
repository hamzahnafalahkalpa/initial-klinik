<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPatient;

use Hanafalah\ModulePatient\Contracts\Schemas\VisitPatient;
use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected VisitPatient $__schema,
    ){

    }
}
