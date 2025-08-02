<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Dispense;

use Projects\Klinik\Requests\API\VisitRegistration\EnvironmentRequest;

class DeleteRequest extends EnvironmentRequest
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
