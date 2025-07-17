<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitPatient;

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