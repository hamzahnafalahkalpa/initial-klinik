<?php

namespace Projects\Klinik\Requests\PatientManagement\PatientRegister;

use Zahzah\LaravelSupport\Requests\FormRequest;

class PatientRegisterEnvironment extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
