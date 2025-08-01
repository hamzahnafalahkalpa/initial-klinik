<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Laboratorium\Referral;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\Referral\EnvironmentRequest;

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
