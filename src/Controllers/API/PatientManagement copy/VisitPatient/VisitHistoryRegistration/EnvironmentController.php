<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitPatient\VisitHistoryRegistration;

use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;
use Zahzah\ModulePatient\Contracts\VisitRegistration;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected VisitRegistration $__visit_registration_schema,
    ){
        parent::__construct();
    }
}
