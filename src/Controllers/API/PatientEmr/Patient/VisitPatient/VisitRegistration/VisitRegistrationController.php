<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitPatient\VisitRegistration;

use Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;
use Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\{
    ViewRequest, ShowRequest, DeleteRequest
};

class VisitRegistrationController extends EnvironmentController
{
    protected function commonConditional($query){
        $query->where('visit_patient_id',request()->visit_patient_id);
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
