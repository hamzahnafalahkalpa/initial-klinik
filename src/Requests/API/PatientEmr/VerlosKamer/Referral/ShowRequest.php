<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VerlosKamer\Referral;

use Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\Referral\EnvironmentRequest;

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
