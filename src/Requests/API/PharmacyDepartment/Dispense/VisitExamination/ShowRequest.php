<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Dispense\VisitExamination;

use Projects\Klinik\Requests\API\PharmacyDepartment\VisitExamination\EnvironmentRequest;

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
