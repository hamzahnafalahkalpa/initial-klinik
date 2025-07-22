<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\EmergencyUnit\VisitExamination;

use Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\{
    ViewRequest, ShowRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\EnvironmentController;

class VisitExaminationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->__visit_examination_schema->viewVisitExaminationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__visit_examination_schema->showVisitExamination();
    }
}
