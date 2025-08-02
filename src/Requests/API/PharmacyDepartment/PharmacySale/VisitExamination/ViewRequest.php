<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\PharmacySale\VisitExamination;

use Projects\Klinik\Requests\API\PharmacyDepartment\VisitExamination\EnvironmentRequest;

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
