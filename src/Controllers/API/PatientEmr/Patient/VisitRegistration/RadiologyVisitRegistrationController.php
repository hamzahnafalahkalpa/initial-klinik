<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitRegistration;

use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
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
