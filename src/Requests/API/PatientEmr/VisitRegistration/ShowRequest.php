<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitRegistration;

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
