<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPatient;

use Projects\Klinik\Contracts\Patient\EMR\VisitPatient;
use Projects\Klinik\Schemas\PatientEmr\EMR\VisitPatient as VisitPatientSchema;
use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected VisitPatientSchema $__visit_patient_schema,
    ){

    }
}
