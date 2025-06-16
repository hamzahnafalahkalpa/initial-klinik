<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitPatient;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'id' => ['nullable']
    ]);
  }
}