<?php

namespace Projects\Klinik\Requests\PatientManagement\Patient;

class ViewRequest extends PatientEnvironment
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