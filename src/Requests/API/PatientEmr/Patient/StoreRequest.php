<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient;

class StoreRequest extends PatientEnvironment
{
    protected $__entity = 'Patient';

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
        return [
        ];
    }
}
