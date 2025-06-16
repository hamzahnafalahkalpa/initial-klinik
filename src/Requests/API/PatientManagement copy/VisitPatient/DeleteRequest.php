<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitPatient;

class DeleteRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id' => ['required']
    ]);
  }
}