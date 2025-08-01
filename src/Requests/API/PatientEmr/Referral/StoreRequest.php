<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Referral;

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
