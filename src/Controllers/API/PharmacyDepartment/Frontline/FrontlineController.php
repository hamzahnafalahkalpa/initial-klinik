<?php

namespace Projects\Klinik\Controllers\API\PharmacyDepartment\Frontline;

use Projects\Klinik\Requests\API\PharmacyDepartment\Frontline\{
    ViewRequest, ShowRequest
};
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\EnvironmentController;

class FrontlineController extends EnvironmentController
{
    public function commonConditional($query){
        $query->whereHas('visitPatient',function($query){
                $query->flagIn('VisitPatient');
              });
            //   ->where('props->is_has_prescription', true);
    }

    public function index(ViewRequest $request){
        return $this->getVisitExaminationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitExamination();
    }
}
