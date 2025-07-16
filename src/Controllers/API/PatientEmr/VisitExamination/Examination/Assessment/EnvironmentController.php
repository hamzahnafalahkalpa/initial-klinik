<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination\Assessment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Assessment;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected Assessment $__assessment_schema
    ){
    }
}
