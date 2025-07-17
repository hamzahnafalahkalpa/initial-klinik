<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitPatient;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
      'search_value' => ['nullable','string']
    ]);
  }
}