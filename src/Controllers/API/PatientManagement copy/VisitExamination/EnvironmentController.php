<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination;

use Projects\Klinik\Controllers\API\ApiController;
use Zahzah\ModulePatient\Contracts\VisitExamination;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected VisitExamination $__visit_examination_schema
    ){
      parent::__construct();  
    }
}
