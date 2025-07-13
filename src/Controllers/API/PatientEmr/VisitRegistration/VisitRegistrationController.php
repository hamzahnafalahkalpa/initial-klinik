<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration;

use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
    ViewRequest
};

class VisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }
}
