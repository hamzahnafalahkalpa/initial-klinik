<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitPatient;

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