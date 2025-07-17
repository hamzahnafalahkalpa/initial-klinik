<?php

namespace Projects\Klinik\Requests\PatientEmr\PatientInService;

class StoreRequest extends PatientInServiceEnvironment
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

        ]);
    }
}
