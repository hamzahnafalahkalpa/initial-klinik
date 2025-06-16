<?php

namespace App\Projects\Klinik\src\Requests\PatientManagement\Patient\EMR;

use Illuminate\Validation\Rule;
use Projects\Klinik\Requests\PatientManagement\Patient\EMR\PatientEnvironment;

class ViewRequest extends FormRequest
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
