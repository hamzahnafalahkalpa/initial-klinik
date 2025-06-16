<?php

namespace Projects\Klinik\Transformers\Examination;

use Hanafalah\LaravelSupport\Resources\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ViewExamination extends ApiResource{
    protected $__local_model;

    public function toArray(Request $request): array
    {
        $model = $this->__local_model = $this->getModel();
        $morph = Str::snake($model->getMorphClass());
        return [
            'visit_examination_id' => null,
            'examination' => [
                $morph => [
                    'data' => $this->getAssessmentData()
                ],
            ]
        ];
    }

    private function getAssessmentData(){
        $response_as = $this->__local_model->response_model;
        
    }
}