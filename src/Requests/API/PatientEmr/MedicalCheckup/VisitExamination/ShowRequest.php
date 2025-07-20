<?php

namespace Projects\Klinik\Requests\API\PatientEmr\MedicalCheckup\VisitExamination;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class ShowRequest extends EnvironmentRequest
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
