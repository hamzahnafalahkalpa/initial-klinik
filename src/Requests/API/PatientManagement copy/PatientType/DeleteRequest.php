<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientType;

class DeleteRequest extends PatientTypeEnvironment
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->setRules([
            'id' => ['required']
        ]);
    }
}
