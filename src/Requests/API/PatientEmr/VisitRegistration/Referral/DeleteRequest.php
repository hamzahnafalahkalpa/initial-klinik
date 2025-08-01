<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitRegistration\Referral;

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
