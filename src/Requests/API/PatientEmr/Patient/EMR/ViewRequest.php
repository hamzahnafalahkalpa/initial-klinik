<?php

namespace Projects\Klinik\Requests\API\PatientEmr\Patient\EMR;

use Illuminate\Validation\Rule;
use Projects\Klinik\Requests\API\PatientEmr\Patient\EMR\PatientEnvironment;

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
