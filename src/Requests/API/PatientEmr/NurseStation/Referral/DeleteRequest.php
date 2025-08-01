<?php

namespace Projects\Klinik\Requests\API\PatientEmr\NurseStation\Referral;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\Referral\EnvironmentRequest;

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
