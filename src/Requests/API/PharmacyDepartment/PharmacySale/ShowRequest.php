<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\PharmacySale;

use Projects\Klinik\Requests\API\VisitRegistration\EnvironmentRequest;

class ShowRequest extends EnvironmentRequest
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
