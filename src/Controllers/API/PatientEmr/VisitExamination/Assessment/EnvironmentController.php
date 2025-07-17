<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Assessment;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected Assessment $__assessment_schema
    ){
        parent::__construct();
    }
}
