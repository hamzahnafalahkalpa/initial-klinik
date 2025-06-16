<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitPatient;

use Projects\Klinik\Contracts\Patient\EMR\VisitPatient;
use Projects\Klinik\Schemas\PatientManagement\EMR\VisitPatient as VisitPatientSchema;
use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected VisitPatientSchema $__visit_patient_schema,
    ){

    }
}
