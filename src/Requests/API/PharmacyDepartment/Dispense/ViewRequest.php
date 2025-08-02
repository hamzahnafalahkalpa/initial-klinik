<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Dispense;

use Projects\Klinik\Requests\API\VisitRegistration\EnvironmentRequest;

class ViewRequest extends EnvironmentRequest
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
