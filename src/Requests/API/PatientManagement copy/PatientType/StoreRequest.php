<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientType;

class StoreRequest extends PatientTypeEnvironment
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->setRules([
            'id'    => ['nullable'],
            'name'  => ['required','string','max:50']
        ]);
    }
}
