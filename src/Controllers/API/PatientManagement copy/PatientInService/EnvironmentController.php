<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\PatientInService;

use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;
use Zahzah\ModulePatient\Contracts\VisitPatient;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected VisitPatient $__visit_patient_schema,
    ){

    }
}
