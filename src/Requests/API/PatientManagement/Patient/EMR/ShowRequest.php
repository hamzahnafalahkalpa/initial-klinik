<?php

namespace Projects\Klinik\Requests\PatientManagement\Patient\EMR;

use Illuminate\Validation\Rule;

class ShowRequest extends PatientEnvironment
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $rules = Rule::in([
      'history-illness',
      'family-illness',
      'allergy',
      'vaccine'
    ]);

    return [
      'uuid' => ['required'],
      'flag' => ['required',$rules]
    ];
  }
}
