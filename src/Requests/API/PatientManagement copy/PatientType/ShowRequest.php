<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientType;

class ShowRequest extends PatientTypeEnvironment
{
    /**
     * Determine if the user is authorized to view the building.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return Gate::allows('view', $this->route('Building'));
    }

    public function rules()
    {
        return [];
    }
}
