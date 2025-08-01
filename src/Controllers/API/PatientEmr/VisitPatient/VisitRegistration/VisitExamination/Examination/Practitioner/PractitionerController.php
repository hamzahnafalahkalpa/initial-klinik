<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPatient\VisitRegistration\VisitExamination\Examination\Practitioner;

use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination\Practitioner\EnvironmentController;
use Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\Practitioner\{
    StoreRequest, ShowRequest, ViewRequest, DeleteRequest
};

class PractitionerController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->__practitioner_schema->viewPractitionerList();
    }


    public function store(StoreRequest $request){
        return $this->__practitioner_schema->storePractitionerEvaluation();
    }

    public function show(ShowRequest $request){
    }

    public function destroy(DeleteRequest $request){
        return $this->__practitioner_schema->removePractitionerEvaluation();
    }
}
