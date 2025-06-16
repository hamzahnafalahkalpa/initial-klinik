<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientInService;

class ViewRequest extends PatientInServiceEnvironment
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
