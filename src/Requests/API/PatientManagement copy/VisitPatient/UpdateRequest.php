<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitPatient;

class UpdateRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id'         => ['required'],
      'type'       => ['requied','in:cancel']
    ]);
  }
}