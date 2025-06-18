<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\PatientType;

use Projects\Klinik\Contracts\Patient\EMR\PatientType;
use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected PatientType $__patient_type_schema
    ){

    }
}
