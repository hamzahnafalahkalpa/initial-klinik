<?php

namespace Projects\Klinik\Requests\API\PatientEmr\EmergencyUnit;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\EnvironmentRequest;

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
