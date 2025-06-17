<?php

namespace App\Projects\Klinik\src\Requests\API\PatientManagement\Patient\EMR;

use Illuminate\Validation\Rule;
use Projects\Klinik\Requests\API\PatientManagement\Patient\EMR\PatientEnvironment;

class ViewRequest extends PatientEnvironment
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
