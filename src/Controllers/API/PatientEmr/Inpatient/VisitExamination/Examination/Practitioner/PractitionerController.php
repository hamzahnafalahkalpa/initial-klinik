<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Inpatient\VisitExamination\Examination\Practitioner;

use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination\Practitioner\EnvironmentController;
use Projects\Klinik\Requests\API\PatientEmr\Inpatient\VisitExamination\Examination\Practitioner\{
    StoreRequest, ShowRequest, ViewRequest, DeleteRequest
};

class PractitionerController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->__practitioner_evaluation_schema->viewPractitionerEvaluationList();
    }


    public function store(StoreRequest $request){
        return $this->__practitioner_evaluation_schema->storePractitionerEvaluation();
    }

    public function show(ShowRequest $request){
        return $this->__practitioner_evaluation_schema->showPractitionerEvaluation();
    }

    public function destroy(DeleteRequest $request){
        return $this->__practitioner_evaluation_schema->deletePractitionerEvaluation();
    }
}
