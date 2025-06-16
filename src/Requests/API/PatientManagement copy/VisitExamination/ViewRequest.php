<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitExamination;

class ViewRequest extends VisitExaminationEnvironment
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