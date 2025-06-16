<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientType;

class ViewRequest extends PatientTypeEnvironment
{
    /**
     * Determine if the user is authorized to view the building.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
