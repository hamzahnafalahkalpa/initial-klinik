<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Inpatient\Referral;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\Referral\EnvironmentRequest;

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
