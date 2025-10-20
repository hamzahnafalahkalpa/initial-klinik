<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\VisitExamination;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class StoreRequest extends EnvironmentRequest
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
