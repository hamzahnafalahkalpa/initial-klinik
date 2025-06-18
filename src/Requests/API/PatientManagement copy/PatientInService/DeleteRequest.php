<?php

namespace Projects\Klinik\Requests\PatientEmr\PatientInService;

class DeleteRequest extends PatientInServiceEnvironment
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->setRules([

        ]);
    }
}
