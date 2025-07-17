<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitRegistration;

use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;
use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
    ViewRequest
};

class LabVisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        request()->merge([
            'flag' => request()->flag ?? 'laboratorium'
        ]);
        return $this->__visit_registration_schema->viewVisitRegistrationPaginate();
    }
}
