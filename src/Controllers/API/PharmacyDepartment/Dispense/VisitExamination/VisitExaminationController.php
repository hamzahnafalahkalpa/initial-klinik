<?php

namespace Projects\Klinik\Controllers\API\PharmacyDepartment\Dispense\VisitExamination;

use Projects\Klinik\Requests\API\PharmacyDepartment\Dispense\VisitExamination\{
    ViewRequest, ShowRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\EnvironmentController;

class VisitExaminationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->getVisitExaminationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitExamination();
    }
}
