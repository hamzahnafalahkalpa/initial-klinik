<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitRegistration;

use Projects\Klinik\Requests\PatientManagement\VisitExamination\{
    ViewRequest
};

class RadiologyVisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        request()->merge([
            'flag' => 'RADIOLOGY'
        ]);
        return $this->__visit_registration_schema->viewVisitRegistrationPaginate();
    }
}
