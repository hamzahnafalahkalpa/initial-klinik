<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitRegistration;

use Projects\Klinik\Requests\PatientManagement\VisitExamination\{
    ViewRequest
};

class LabVisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        request()->merge([
            'flag' => 'LABORATORY'
        ]);
        return $this->__visit_registration_schema->viewVisitRegistrationPaginate();
    }
}
