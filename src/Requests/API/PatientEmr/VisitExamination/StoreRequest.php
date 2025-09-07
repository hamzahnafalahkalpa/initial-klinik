<?php

namespace Projects\Klinik\Requests\API\PatientEmr\VisitExamination;

class StoreRequest extends EnvironmentRequest
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
