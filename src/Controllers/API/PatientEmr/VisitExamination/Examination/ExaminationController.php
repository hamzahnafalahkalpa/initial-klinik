<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Examination\{
    StoreRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination\EnvironmentController;

class ExaminationController extends EnvironmentController
{
    public function store(StoreRequest $request){
        return $this->storeExamination();
    }
}
