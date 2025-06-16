<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitRegistration;

use Projects\Klinik\Controllers\API\ApiController;
use Zahzah\ModulePatient\Contracts\VisitRegistration;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected VisitRegistration $__visit_registration_schema
    ){
        parent::__construct();
    }
}
