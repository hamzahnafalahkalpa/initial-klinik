<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\VisitExamination\Examination\Assessment;

use Illuminate\Support\Str;
use Projects\Klinik\Requests\PatientManagement\VisitExamination\Examination\{
    ViewRequest, StoreRequest, ShowRequest
};

class AssessmentController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->__assessment_schema->viewAssessmentList();
    }

    public function store(StoreRequest $request){
        // return $this->__assessment_schema->();
    }

    public function show(ShowRequest $request){
        $data = $this->__assessment_schema->showAssessment();
        if(isset($data)) return $data;

        $flag = Str::studly(request()->flag);
        $model = $this->{$flag.'Model'}();
        return (\method_exists($model,'getExams')) ? $model->getExams() : null;
    }
}
