<?php

namespace Projects\Klinik\Requests\API\PatientEmr\EmergencyUnit;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\EnvironmentRequest;

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
