<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPatient\VisitRegistration\VisitExamination\Examination;

use Projects\Klinik\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\{
    StoreRequest, UpdateRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination\EnvironmentController;

class ExaminationController extends EnvironmentController
{
    public function store(StoreRequest $request){
        return $this->storeExamination();
    }
}
