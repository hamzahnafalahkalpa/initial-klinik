<?php

namespace Projects\Klinik\Requests\API\PatientEmr\EmergencyUnit\VisitExamination;

use Projects\Klinik\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class DeleteRequest extends EnvironmentRequest
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
