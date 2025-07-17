<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitExamination;

class ViewRequest extends EnvironmentRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
