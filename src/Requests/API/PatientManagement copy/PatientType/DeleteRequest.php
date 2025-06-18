<?php

namespace Projects\Klinik\Requests\PatientEmr\PatientType;

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
