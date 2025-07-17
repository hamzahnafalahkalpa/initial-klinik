<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination\Practitioner;

use Projects\Klinik\Contracts\Patient\EMR\PractitionerEvaluation;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected PractitionerEvaluation $__practitioner_schema
    ){
    }
}
