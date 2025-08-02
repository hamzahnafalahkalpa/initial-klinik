<?php

namespace Projects\Klinik\Controllers\API\PharmacyDepartment\PharmacySale\VisitExamination\Assessment;

use Illuminate\Support\Str;
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Assessment\EnvironmentController;
use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Assessment\{
    ViewRequest, StoreRequest, ShowRequest
};

class AssessmentController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->getAssessment();
    }

    public function store(StoreRequest $request){
        request()->merge([
            'morph'            => Str::studly(request()->flag),
            'examination_type' => 'VisitExamination',
            'examination_id'   => request()->visit_examination_id
        ]);
        return $this->__assessment_schema->storeAssessment();
    }

    public function show(ShowRequest $request){
        return $this->getAssessment();
    }
}
