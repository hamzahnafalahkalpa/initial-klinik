<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitRegistration;

use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
    ViewRequest
};
use Zahzah\ModulePatient\Resources\VisitRegistration\ViewVisitRegistration;

class AdminVisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        request()->merge([
            'flag' => 'Outpatient',
            'medic_service_id' => $this->ServiceModel()->where('name','Admin')->first()->getKey()
        ]);
        return $this->__visit_registration_schema->viewVisitRegistrationPaginate();
    }
}
