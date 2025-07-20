<?php

namespace Projects\Klinik\Requests\API\PatientEmr\MedicalCheckup\VisitExamination;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

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
