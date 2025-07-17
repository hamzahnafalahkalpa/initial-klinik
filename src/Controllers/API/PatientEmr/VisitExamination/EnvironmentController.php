<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination;

use Hanafalah\ModulePatient\Contracts\Schemas\VisitExamination;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected VisitExamination $__visit_examination_schema
    ){
      parent::__construct();  
    }
}
