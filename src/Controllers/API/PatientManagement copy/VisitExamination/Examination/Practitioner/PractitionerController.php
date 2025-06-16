<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitExamination\Examination\Practitioner;

use Projects\Klinik\Requests\PatientManagement\VisitExamination\Examination\Practitioner\{
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
