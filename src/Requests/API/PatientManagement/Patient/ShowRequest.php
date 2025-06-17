<?php

namespace Projects\Klinik\Requests\API\PatientManagement\Patient;

class ShowRequest extends PatientEnvironment
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
