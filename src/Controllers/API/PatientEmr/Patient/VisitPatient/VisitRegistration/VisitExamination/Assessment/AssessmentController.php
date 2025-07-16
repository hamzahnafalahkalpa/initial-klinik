<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Assessment;

use Illuminate\Support\Str;
use Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Assessment\EnvironmentController;
use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\Assessment\{
    ViewRequest, StoreRequest, ShowRequest
};

class AssessmentController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->__assessment_schema->viewAssessmentList();
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
        $data = $this->__assessment_schema->showAssessment();
        if(!isset($data)) {
            $flag  = Str::studly(request()->flag);
            $model = $this->{$flag.'Model'}();
            $data  = (\method_exists($model,'getExams')) ? $model->getExams() : null;
        }
        $response = [
            'visit_examiantion_id' => request()->visit_examination_id,
        ];
        $exam_type = request()->exam_type;
        switch ($exam_type) {
            case 'medical-support':
            case 'prescription':
            case 'examination':
                $response[$exam_type] = [
                    $flag => [
                        'data' => $data
                    ]
                ];
            break;
            case 'treatments':
                $response[$exam_type] = $data;
            break;
        }
    }
}
