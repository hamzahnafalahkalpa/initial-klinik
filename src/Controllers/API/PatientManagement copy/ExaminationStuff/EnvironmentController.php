<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\ExaminationStuff;

use Gii\ModuleExamination\Contracts\ExaminationStuff;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected ExaminationStuff $__examination_stuff_schema
    ){
        
    }
}
