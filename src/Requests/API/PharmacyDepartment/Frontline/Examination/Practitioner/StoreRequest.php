<?php

namespace Projects\Klinik\Requests\API\PharmacyDepartment\Frontline\Examination\Practitioner;

use Projects\Klinik\Requests\API\VisitRegistration\VisitExamination\Examination\Practitioner\Environment;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [
      'id'                  => ['nullable'],
      'practitioner_id'     => ['required',$this->idValidation(app(config('module-patient.practitioner')))], 
      'as_delegation'       => ['nullable','boolean']
    ];
  }
}