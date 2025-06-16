<?php

namespace Projects\Klinik\Requests\PatientManagement\VisitExamination;

class ShowRequest extends VisitExaminationEnvironment
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