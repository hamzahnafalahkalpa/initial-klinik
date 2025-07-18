<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Assessment;
use Projects\Klinik\Controllers\API\ApiController;
use Illuminate\Support\Str;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected Assessment $__assessment_schema
    ){
        parent::__construct();
    }

    protected function getAssessment(){
        $data = $this->__assessment_schema->showAssessment();
        if(!isset($data)) {
            $flag  = Str::studly(request()->flag);
            $model = $this->{$flag.'Model'}();
            $data  = (\method_exists($model,'getExams')) ? $model->getExams() : null;
        }
        return $data;
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
