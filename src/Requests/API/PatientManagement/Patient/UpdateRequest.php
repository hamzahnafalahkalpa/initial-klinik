<?php

namespace Projects\Klinik\Requests\API\PatientManagement\Patient;

class UpdateRequest extends PatientEnvironment
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